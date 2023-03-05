<?php

namespace App\Http\Livewire\Admin;

use App\Models\Slider;
use Livewire\Component;
use Livewire\WithPagination;

class AdminSliderComponent extends Component
{
    use WithPagination;
    public function deleteSlider($id)
    {
        $slider = Slider::find($id);
        if ($slider->image) 
        {
            unlink('assets/images//home/sliders'.'/'.$slider->image);
        }

        $slider->delete();
        session()->flash('message','El Slider ha sido borrado exitosamente!');
    }
    public function render()
    {
        $sliders = Slider::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-slider-component',['sliders'=>$sliders])->layout('layouts.base');
    }
}
