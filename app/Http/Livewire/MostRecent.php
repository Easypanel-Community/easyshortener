<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class MostRecent extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.most-recent', [
            'links' => auth()->user()->links()
                ->orderByDesc('created_at')
                ->simplePaginate(10),
        ]);
    }
}