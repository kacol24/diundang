<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Intervention\Image\Image;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use SimpleSoftwareIO\QrCode\Generator;

class GenerateQrCode implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    public $code;

    public function __construct($code)
    {
        $this->code = $code;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $qrPath = storage_path('app/public/qr');
        $qrName = $this->code.'.png';
        $qrFullPath = $qrPath.'/'.$qrName;

        $invitationPath = storage_path('app/public');
        $invitationName = "[{$this->code}] INVITATION, The Wedding of Kevin & Fernanda, 24 September 2022.png";
        $invitationFullPath = $invitationPath.'/'.$invitationName;

        $qrcode = new Generator;

        $qrcode->size(500)
               ->format('png')
               ->color(77, 28, 50)
               ->errorCorrection('H')
               ->merge('/public/images/logo-qr.png')
               ->generate($this->code, $qrFullPath);

        $template = Image::make('public/images/template.jpg');
    }
}
