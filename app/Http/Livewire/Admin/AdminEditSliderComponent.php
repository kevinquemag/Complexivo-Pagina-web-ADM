<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditSliderComponent extends Component
{
    use WithFileUploads;

    public $status;
    public $image;

    public $newimage;
    public $slider_id;


    public function mount($sliders_image)
    {
        $slider = Slider::where('image',$sliders_image)->first();
        
        $this->status=$slider->status;

        $this->image =$slider->image;
        $this->slider_id = $slider->id;
    }


    public function updated($fields)
    {
        if ($this->newimage) 
        {
            $this->validateOnly($fields,[
                'newimage' => 'required'
            ]);
        }
    }

    public function updateSlider()
    {
        if ($this->newimage) 
        {
            $this->validate([
                'newimage' => 'required'
            ]);
        }

        $slider = Slider::find($this->slider_id);
        $slider->status= $this->status;
        if ($this->newimage) 
        {   
            unlink('assets/images/home/sliders'.'/'.$slider->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home/sliders',$imageName);
            $slider->image =$imageName;
        }
        $slider->save();
        session()->flash('message','El Slider ha sido actualizado!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-slider-component')->layout('layouts.base');
    }
}
