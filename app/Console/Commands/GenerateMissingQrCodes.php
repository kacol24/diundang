<?php

namespace App\Console\Commands;

use App\Jobs\GenerateQrCode;
use App\Models\Invitation;
use Illuminate\Console\Command;

class GenerateMissingQrCodes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:regenerate-qr-codes';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Checks and generates missing QR Codes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invitations = Invitation::all();

        foreach ($invitations as $invitation) {
            $this->info('Processing guest: '.$invitation->guest_code);

            $qrPath = storage_path('app/public/qr');
            $qrName = $invitation->code.'.png';
            $qrFullPath = $qrPath.'/'.$qrName;

            if (file_exists($qrFullPath)) {
                $this->warn("Skipping [{$invitation->guest_code}] already exists!");
            } else {
                $this->info("Generating for guest: ".$invitation->guest_code);
                GenerateQrCode::dispatchSync($invitation->guest_code);
            }
        }
    }
}
