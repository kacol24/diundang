<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FloatingQrButton extends Component
{
    public $isShown = false;

    public $invitation;

    protected $listeners = ['rsvpUpdated' => 'setIsShown'];

    public function mount()
    {
        if (optional($this->invitation)->is_attending) {
            $this->isShown = true;
        }
    }

    public function setIsShown($payload)
    {
        $this->isShown = $payload['invitation']['is_attending'];
    }

    public function render()
    {
        return view('livewire.floating-qr-button');
    }
}
