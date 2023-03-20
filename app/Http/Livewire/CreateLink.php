<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Illuminate\Support\Str;
// use Vinkla\Hashids\Facades\Hashids;

class CreateLink extends Component
{
    public $url;
    public $slug;

    protected $rules = [
        'url' => 'required|url|max:255',
        'slug' => 'nullable|alpha_dash|unique:links,slug|min:3|max:100',
    ];

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function saveLink()
    {
        $this->validate();

        $link = Link::create([
            'url'=> $this->url,
            'slug' => $this->slug ?? Str::random(20),
            'user_id' => auth()->user()->id,
        ]);

        if (! $this->slug) {
            // remove till package updated $link->update(['slug' => Hashids::encode($link->id)]);
            $link->update(['slug' => Str::random(9)]);
        }

        session()->flash('notification',
            [
                'type' => 'success',
                'message' => 'Successfully Created Link'
            ]);

        return redirect(route('links'));
    }

    public function resetForm()
    {
        $this->reset();
        $this->resetValidation();
    }

    public function render()
    {
        return view('livewire.create-link');
    }
}