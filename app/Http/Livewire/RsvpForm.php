<?php

namespace App\Http\Livewire;

use Livewire\Component;

class RsvpForm extends Component
{
    public $invitation;

    public $guestName;

    public $guests;

    public $isAttending;

    public function save()
    {
        $this->invitation->is_attending = $this->isAttending;
        $this->invitation->guests = $this->guests;
        $this->invitation->rsvp_at = now();
        $this->invitation->save();

        session()->flash('success', 'Thank you for confirming your presence.');
    }

    public function mount()
    {
        if($this->invitation->rsvp_at) {
            $this->guests = $this->invitation->guests;
            $this->isAttending = $this->invitation->is_attending;
        }
    }

    public function render()
    {
        return view('livewire.rsvp-form');
    }
}
