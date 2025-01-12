<?php

namespace App\Livewire;

use App\Models\Comment;
use App\Models\Discussion;
use Livewire\Component;
use Livewire\WithPagination;

class DiscussionComments extends Component
{
    use WithPagination;

    public Discussion $discussion;
    public $newComment = '';

    protected $rules = [
        'newComment' => 'required|min:3'
    ];

    public function postComment()
    {
        $this->validate();

        $this->discussion->comments()->create([
            'body' => $this->newComment,
            'user_id' => auth()->id()
        ]);

        $this->newComment = '';
        $this->resetPage();
    }

    public function render()
    {
        $comments = $this->discussion->comments()
            ->with('user')
            ->latest()
            ->paginate(10);

        return view('livewire.discussion-comments', [
            'comments' => $comments
        ]);
    }
}
