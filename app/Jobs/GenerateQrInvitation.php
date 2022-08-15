<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Str;
use Intervention\Image\ImageManager;

class GenerateQrInvitation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $invitation;

    /**
     * @var \Intervention\Image\ImageManager
     */
    protected ImageManager $intervention;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
        $this->intervention = new ImageManager;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $guestCode = $this->invitation->guest_code;
        $qrname = storage_path("app/public/qr/{$guestCode}.png");

        if (! file_exists($qrname)) {
            GenerateQrCode::dispatchSync($guestCode);
        }

        $templatePath = public_path('images/template-3.jpg');
        if ($this->invitation->is_teapai) {
            $templatePath = public_path('images/template-3-teapai.jpg');
        }
        $template = $this->intervention->make($templatePath);
        $qrPrintable = $this->processQrCode();
        $template->insert($qrPrintable, 'top-left', 350 - 50, 525 - 50);
        $template->save(storage_path("app/public/{$guestCode}.jpg"));
    }

    protected function processQrCode()
    {
        $guestName = $this->invitation->full_name; // 44 max
        $guestCode = $this->invitation->guest_code;
        $fontSize = 45 - (round(strlen($guestName) / 10) * 5);
        $seating = $this->invitation->seating;

        $qrname = storage_path("app/public/qr/{$guestCode}.png");

        $blankWhite = $this->intervention->make(public_path('images/blank-white.jpg'));
        $blankWhite->insert($qrname, 'top-left', 350 - 300, 525 - 475);
        $blankWhite->text($guestName, 600 - 300, 1100 - 475, function ($font) use ($fontSize) {
            $font->file(public_path('fonts/MADETOMMY-Bold.ttf'));
            $font->size($fontSize);
            $font->align('center');
            $font->valign('middle');
        });
        $blankWhite->text($guestCode, 600 - 300, 1140 - 475, function ($font) {
            $font->file(public_path('fonts/MADETOMMY.ttf'));
            $font->size(28);
            $font->align('center');
            $font->valign('middle');
        });
        $pax = $this->invitation->pax ?? $this->invitation->guests;
        $table = '';
        if ($seating) {
            $table = 'Table: '.$this->invitation->seating->name.' | ';
        }
        if ($this->invitation->is_family) {
            $table .= 'Family';
        } else {
            $table .= $pax.' '.Str::plural('guest', $pax);
        }

        $blankWhite->text($table, 600 - 300, 1180 - 475, function ($font) {
            $font->file(public_path('fonts/MADETOMMY.ttf'));
            $font->size(28);
            $font->align('center');
            $font->valign('middle');
        });

        $blankWhite->save(storage_path("app/public/printable/{$guestCode}.jpg"));

        return storage_path("app/public/printable/{$guestCode}.jpg");
    }
}
