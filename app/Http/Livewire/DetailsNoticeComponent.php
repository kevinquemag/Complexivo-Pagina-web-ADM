<?php

namespace App\Http\Livewire;

use App\Models\Notice;
use Livewire\Component;

class DetailsNoticeComponent extends Component
{
    public $slug;

    public function mount($slug)
    {
        $this->slug = $slug;
        
    }
    public function render()
    {
        $notice = Notice::where('slug', $this->slug)->first();

        return view('livewire.details-notice-component',['notice'=> $notice])->layout('layouts.base');
    }
}
