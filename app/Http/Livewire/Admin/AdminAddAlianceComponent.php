<?php

namespace App\Http\Livewire\Admin;

use App\Models\Aliance;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddAlianceComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $link;
    public $status;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
             'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }

    public function addAliance()
    {
        $this->validate([
            'name' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $aliance = new Aliance();
        $aliance->name =$this->name;
        $aliance->link =$this->link;
        $aliance->status= $this->status;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home/alianzas',$imageName);
        $aliance->image =$imageName;

        $aliance->save();
        session()->flash('message','Alianza creada con éxito!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-aliance-component')->layout('layouts.base');
    }
}
