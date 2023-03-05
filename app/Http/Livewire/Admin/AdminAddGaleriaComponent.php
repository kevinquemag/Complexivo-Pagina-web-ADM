<?php

namespace App\Http\Livewire\Admin;

use Illuminate\Support\Collection;
use App\Models\Gallery;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddGaleriaComponent extends Component
{
    use WithFileUploads;

   
   
    public $status;
    public $type;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'type' => 'required'
            //'image' => 'mimes:jpeg,png,jpg',
        ]);
    }

    public function addEvent()
    {
        $this->validate([
            'type' => 'required',
            //'image' => 'mimes:jpeg,png,jpg',

        ]);
        $galler = new Gallery();
        $galler->type =$this->type;
        $galler->status= $this->status;
      

        if ($this->image) {
            $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
            $this->image->storeAs('fundacionImagenes/galeriaedit',$imageName);
            $galler->image =$imageName;
        }

        $galler->save();
        session()->flash('message','Imagen creada con éxito!');
    }
 
    public function render()
    {
        return view('livewire.admin.admin-add-galeria-component')->layout('layouts.base');
    }
}
