<?php

namespace App\Http\Livewire;

use App\Events\InvitationCreated;
use App\Events\InvitationUpdated;
use App\Models\Group;
use App\Models\Invitation;
use Livewire\Component;

class RsvpForm extends Component
{
    public $invitation;

    public $guestName;

    public $phone;

    public $guests;

    public $isAttending;

    public $group;

    public function save()
    {
        if (! $this->invitation) {
            $hasInvitationBasedOnPhone = Invitation::where('phone', $this->phone)->first();
            if ($hasInvitationBasedOnPhone) {
                return redirect()->route('home', ['guest' => $hasInvitationBasedOnPhone->guest_code]);
            }

            $group = null;
            if ($this->group) {
                $group = Group::firstWhere('name', $this->group);
            }

            $invitation = Invitation::create([
                'guest_code' => Invitation::generateGuestCode(),
                'name'       => $this->guestName,
                'phone'      => $this->phone,
                'guests'     => 2,
                'group_id'   => optional($group)->id,
                'seating_id' => optional($group)->seating_id
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

        event(new InvitationUpdated($this->invitation, sync: true));

        sleep(1);

        session()->flash('success', 'Thank you for confirming your presence.');

        $this->emit('rsvpUpdated', ['invitation' => $this->invitation]);
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
