<?php

namespace App\Http\Livewire;

use App\Models\Link;
use Livewire\Component;
use Illuminate\Validation\Rule;

class EditLink extends Component
{
    public $link_id;
    public $url;
    public $slug;
    public $is_enabled;

    public function rules() {
        return [
            'url' => ['required', 'url', 'max:255'],
            'slug' => ['required', 'alpha_dash', 'min:3', 'max:100', Rule::unique('links')->ignore($this->link_id)],
            'is_enabled' => ['required', 'boolean'],
        ];
    }

    public function updated($property)
    {
        $this->validateOnly($property);
    }

    public function mount($link)
    {
        $this->link_id = $link->id;
        $this->url = $link->url;
        $this->slug = $link->slug;
        $this->is_enabled = $link->is_enabled;
    }

    public function saveLink()
    {
        $link = Link::findOrFail($this->link_id);
        
        $link->update($this->validate());

        return redirect(route('links'));
    }

    public function render()
    {
        return view('livewire.edit-link');
    }
}
