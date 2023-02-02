<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;

class LinkTable extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.link-table', [
            'links' => auth()->user()->links()
                ->orderByDesc('created_at')
                ->simplePaginate(10),
        ]);
    }
}
