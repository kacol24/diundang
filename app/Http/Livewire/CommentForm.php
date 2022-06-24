<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Livewire\Component;

class CommentForm extends Component
{
    public $name;

    public $message;

    public $guest;

    protected $rules = [
        'name'    => 'required|min:2',
        'message' => 'required|min:2',
    ];

    public function save()
    {
        $this->validate();

        $invitationId = null;
        if ($this->guest) {
            $invitation = Invitation::firstWhere('guest_code', $this->guest);
            $invitationId = $invitation?->id;
        }
        
        Comment::create([
            'invitation_id' => $invitationId,
            'ip_address'    => request()->ip(),
            'is_approved'   => ! (Str::contains($this->name, config('badwords'), true) || Str::contains($this->message,
                    config('badwords'), true)),
            'name'          => $this->name,
            'message'       => $this->message,
        ]);

        $this->emit('commentSaved');

        $this->reset([
            'name',
            'message',
        ]);
    }

    public function mount(Request $request)
    {
        $this->guest = $request->guest;
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
