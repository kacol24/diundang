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
    protected $description = 'Generates QR Codes';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invitations = Invitation::all();

        foreach ($invitations as $invitation) {
            $this->info('Generating for guest: '.$invitation->guest_code);
            GenerateQrCode::dispatchSync($invitation->guest_code);
        }
    }
}
