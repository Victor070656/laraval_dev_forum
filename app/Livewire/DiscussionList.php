<?php

namespace App\Livewire;

use App\Models\Discussion;
use Livewire\Component;
use Livewire\WithPagination;

class DiscussionList extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.discussion-list', [
            'discussions' => Discussion::with('user')->latest()->paginate(10)
        ]);
    }
}
