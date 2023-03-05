<?php

namespace App\Http\Livewire;

use App\Models\Event;
use Livewire\Component;

class DetailsComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        
    }

    public function render()
    {
        $event = Event::where('slug', $this->slug)->first();

        return view('livewire.details-component',['event'=> $event])->layout('layouts.base');
    }
}
