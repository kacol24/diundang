<?php

namespace App\Http\Livewire;

use App\Events\InvitationCreated;
use App\Models\Group;
use App\Models\Invitation;
use Livewire\Component;

class RsvpForm extends Component
{
    public $invitation;

    public $guestName;

    public $guests;

    public $isAttending;

    public $group;

    public function save()
    {
        if (! $this->invitation) {
            $group = null;
            if ($this->group) {
                $group = Group::firstWhere('name', $this->group);
            }

            $invitation = Invitation::create([
                'guest_code' => Invitation::generateGuestCode(),
                'name' => $this->guestName,
                'guests' => 2,
                'group_id' => optional($group)->id,
                //'is_attending' => $this->isAttending,
                //'pax'          => $this->guests,
                //'rsvp_at'      => now(),
            ]);

            event(new InvitationCreated($invitation, sync: true));

            $this->dispatchBrowserEvent('rsvp-created', ['guest' => $invitation->guest_code]);
            $this->emit('rsvpCreated', ['guest' => $invitation->guest_code]);

            $this->invitation = $invitation;
        }

        $this->invitation->is_attending = $this->isAttending;
        $this->invitation->pax = $this->guests;
        $this->invitation->rsvp_at = now();
        $this->invitation->save();

        $this->emit('rsvpUpdated', ['invitation' => $this->invitation]);

        session()->flash('success', 'Thank you for confirming your presence.');
    }

    public function mount()
    {
        if (optional($this->invitation)->rsvp_at) {
            $this->guests = $this->invitation->pax;
            $this->isAttending = $this->invitation->is_attending;
        }
    }

    public function render()
    {
        return view('livewire.rsvp-form');
    }
}
