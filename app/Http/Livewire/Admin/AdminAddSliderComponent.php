<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddSliderComponent extends Component
{
    use WithFileUploads;
    public $status;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'image' => 'required|mimes:jpeg,png,jpg',

        ]);
    }

    public function addSlider()
    {
        $this->validate([
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $slider = new Slider();
        $slider->status= $this->status;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home/sliders',$imageName);
        $slider->image =$imageName;

        $slider->save();
        session()->flash('message','Slider creado con éxito!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-slider-component')->layout('layouts.base');
    }
}
