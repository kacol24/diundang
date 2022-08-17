<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use App\Models\Invitation;
use App\Settings\BadWordsSettings;
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

    protected $listeners = ['rsvpCreated' => 'setInvitation'];

    public function save()
    {
        $this->validate();

        $invitationId = null;
        if ($this->guest) {
            $invitation = Invitation::firstWhere('guest_code', $this->guest);
            $invitationId = $invitation?->id;
        }

        $badWords = app(BadWordsSettings::class)->bad_words;
        $isApproved = ! (Str::contains($this->name, $badWords, true) ||
            Str::contains($this->message, $badWords, true));

        Comment::create([
            'invitation_id' => $invitationId,
            'ip_address'    => request()->ip(),
            'is_approved'   => $isApproved,
            'name'          => $invitation->full_name,
            'message'       => $this->message,
        ]);

        $this->emit('commentSaved');

        if ($isApproved) {
            session()->flash('success', 'Wish successfully posted.');
        } else {
            session()->flash('danger', 'Whoops! Bad words are a no, no :(');
        }

        $this->reset([
            'message',
        ]);
    }

    public function setInvitation($payload)
    {
        $invitation = Invitation::firstWhere('guest_code', $payload['guest']);

        if ($invitation) {
            $this->guest = $invitation->guest_code;
            $this->name = $invitation->full_name;
        }
    }

    public function mount(Request $request)
    {
        $this->setInvitation(['guest' => $request->guest]);
    }

    public function render()
    {
        return view('livewire.comment-form');
    }
}
