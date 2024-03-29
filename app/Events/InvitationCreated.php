<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class InvitationCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $invitation;

    public bool $sync;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($invitation, $sync = false)
    {
        $this->invitation = $invitation;
        $this->sync = $sync;

        Log::debug('InvitationCreated');
    }
}
