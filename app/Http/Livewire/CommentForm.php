<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Invitation;
use Livewire\Component;

class CommentForm extends Component
{
    public $name;

    public $message;

    protected $rules = [
        'name'    => 'required|min:2',
        'message' => 'required|min:2',
    ];

    public function save($guest = null)
    {
        $this->validate();

        $invitationId = null;
        if ($guest) {
            $invitation = Invitation::firstWhere('guest_code', $guest);
            $invitationId = $invitation?->id;
        }

        Comment::create([
            'invitation_id' => $invitationId,
            'ip_address'    => request()->ip(),
            'is_approved'   => true,
            'name'          => $this->name,
            'message'       => $this->message,
        ]);

        $this->reset([
            'name',
            'message',
        ]);
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
