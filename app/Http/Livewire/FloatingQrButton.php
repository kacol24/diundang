<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FloatingQrButton extends Component
{
    public $isShown = false;

    protected $listeners = ['rsvpUpdated' => 'setIsShown'];

    public function setIsShown($payload)
    {
        $this->isShown = $payload['invitation']['is_attending'];
    }

    public function render()
    {
        return view('livewire.floating-qr-button');
    }
}
