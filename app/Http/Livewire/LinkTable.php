<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Link; // Make sure to import the Link model

class LinkTable extends Component
{
    use WithPagination;

    public $search = ''; // Add the search property

    public function render()
    {
        $query = Link::query()->where('user_id', auth()->user()->id)
            ->when($this->search, function ($q) {
                $q->where('url', 'like', '%' . $this->search . '%')
                    ->orWhere('slug', 'like', '%' . $this->search . '%');
            })
            ->orderByDesc('created_at');

        $links = $query->paginate(10);

        return view('livewire.link-table', compact('links'));
    }
}
