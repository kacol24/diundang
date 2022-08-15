<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentList extends Component
{
    public $comments = [];

    protected $listeners = ['commentSaved' => 'fetchComments'];

    public function fetchComments()
    {
        $this->comments = Comment::approved()->latest()->get();
    }

    public function render()
    {
        $this->fetchComments();

        return view('livewire.comment-list', [
            'comments' => $this->comments,
        ]);
    }
}
