<?php

namespace App\Console\Commands;

use App\Jobs\GenerateQrCode;
use App\Jobs\GenerateQrInvitation;
use App\Models\Invitation;
use Illuminate\Console\Command;

class RegenrateQrInvitation extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate:regenerate-qr-invitations';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Re-generates QR Invitation';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $invitations = Invitation::all();

        foreach ($invitations as $invitation) {
            $guestCode = $invitation->guest_code;
            $this->info('Generating for guest: '.$guestCode);
            GenerateQrInvitation::dispatchSync($invitation);
        }
    }
}
