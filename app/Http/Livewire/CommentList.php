<?php

namespace App\Http\Livewire;

use App\Models\Comment;
use Livewire\Component;

class CommentList extends Component
{
    public function render()
    {
        $comments = Comment::approved()->latest()->get();

        return view('livewire.comment-list', [
            'comments' => $comments,
        ]);
    }
}
