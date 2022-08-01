<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\ImageManager;

class GenerateQrInvitation implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $invitation;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($invitation)
    {
        $this->invitation = $invitation;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $guestName = $this->invitation->name; // 44 max
        $guestCode = $this->invitation->guest_code;
        $fontSize = 45 - (round(strlen($guestName) / 10) * 5);
        $seating = $this->invitation->seating;

        $qrname = storage_path("app/public/qr/{$guestCode}.png");
        if (! file_exists($qrname)) {
            GenerateQrCode::dispatchSync($guestCode);
        }

        $intervention = new ImageManager;
        $templatePath = public_path('images/template-3.jpg');
        if ($this->invitation->is_teapai) {
            $templatePath = public_path('images/template-3-teapai.jpg');
        }
        $template = $intervention->make($templatePath);
        $template->insert($qrname, 'top-left', 350, 525);
        $template->text($guestName, 600, 1100, function ($font) use ($fontSize) {
            $font->file(public_path('fonts/MADETOMMY-Bold.ttf'));
            $font->size($fontSize);
            $font->align('center');
            $font->valign('middle');
        });
        $template->text($guestCode, 600, 1140, function ($font) {
            $font->file(public_path('fonts/MADETOMMY.ttf'));
            $font->size(20);
            $font->align('center');
            $font->valign('middle');
        });
        if ($seating) {
            $template->text('Table: Arendelle', 600, 1180, function ($font) {
                $font->file(public_path('fonts/MADETOMMY.ttf'));
                $font->size(20);
                $font->align('center');
                $font->valign('middle');
            });
        }

        $template->save(storage_path("app/public/{$guestCode}.jpg"));
    }
}
