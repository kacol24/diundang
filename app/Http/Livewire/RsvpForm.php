<?php

namespace App\Http\Livewire;

use App\Models\Invitation;
use Livewire\Component;

class RsvpForm extends Component
{
    public $invitation;

    public $guestName;

    public $guests;

    public $isAttending;

    public function save()
    {
        if (! $this->invitation) {
            $invitation = Invitation::create([
                'guest_code' => Invitation::generateGuestCode(),
                'name'       => $this->guestName,
                'guests'     => 2,
                //'is_attending' => $this->isAttending,
                //'pax'          => $this->guests,
                //'rsvp_at'      => now(),
            ]);

            $this->dispatchBrowserEvent('rsvp-created', ['guest' => $invitation->guest_code]);
            $this->emit('rsvpCreated', ['guest' => $invitation->guest_code]);

            $this->invitation = $invitation;
        }

        $this->invitation->is_attending = $this->isAttending;
        $this->invitation->pax = $this->guests;
        $this->invitation->rsvp_at = now();
        $this->invitation->save();

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