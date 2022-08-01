<?php

namespace App\Listeners;

use App\Events\InvitationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateQrInvitation implements ShouldQueue
{
    public function handle(InvitationCreated $event)
    {
        $invitation = $event->invitation;

        \App\Jobs\GenerateQrInvitation::dispatch($invitation);
    }
}
