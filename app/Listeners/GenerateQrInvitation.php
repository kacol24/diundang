<?php

namespace App\Listeners;

use App\Events\InvitationCreated;
use Illuminate\Contracts\Queue\ShouldQueue;

class GenerateQrInvitation implements ShouldQueue
{
    public function handle(InvitationCreated $event)
    {
        $invitation = $event->invitation;

        if ($event->sync) {
            return \App\Jobs\GenerateQrInvitation::dispatchSync($invitation);
        }

        return \App\Jobs\GenerateQrInvitation::dispatchAfterResponse($invitation);
    }
}
