<?php

namespace App\Livewire;

use App\Models\Discussion;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class PostDiscussion extends Component
{
    #[Validate("required|max:255")]
    public $title;
    #[Validate("required")]
    public $body;
    public $user_id;

    public function __construct()
    {
        $this->user_id = Auth::user()->id;
    }
    public function submit()
    {
        $this->validate();
        Discussion::create(
            $this->only(['title', 'body', 'user_id'])
        );
        session()->flash('status', 'Discussion posted successfully.');
        return $this->redirect(route("discussions"));
    }
    public function render()
    {
        return view('livewire.post-discussion');
    }
}
