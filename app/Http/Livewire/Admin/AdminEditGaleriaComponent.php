<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithFileUploads;
use Carbon\Carbon;

class AdminEditGaleriaComponent extends Component
{
    use WithFileUploads;

    
   
    public $status;
    public $type;
    public $image;
    public $newimage;
    public $galler_id;

    public function mount($eventos_slug)
    {
        $galler = Gallery::where('id', $eventos_slug)->first();

        $this->status = $galler->status;
        $this->type = $galler->type;
        $this->image = $galler->image;
        $this->galler_id = $galler->id;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields, [
         
            'type' => 'required',
       
        ]);
        if ($this->newimage) {
            $this->validateOnly($fields, [
                'newimage' => 'required',
            ]);
        }
    }

    public function updateEvent()
    {
        $this->validate([
            
            'type' => 'required',
          
        ]);

        if ($this->newimage) {
            $this->validate([
                'newimage' => 'required',
            ]);
        }

        $galler = Gallery::find($this->galler_id);
        $galler->type = $this->type;
        $galler->status = $this->status;

        if ($this->newimage) {
            unlink('assets/images/fundacionImagenes/galeriaedit' . '/' . $galler->image);
            $imageName = Carbon::now()->timestamp . '.' . $this->newimage->extension();
            $this->newimage->storeAs('fundacionImagenes/galeriaedit', $imageName);
            $galler->image = $imageName;
        }

        $galler->save();
        session()->flash('message', 'La Galeria ha sido actualizada!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-galeria-component')->layout('layouts.base');
    }
}
