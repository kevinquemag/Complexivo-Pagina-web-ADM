<?php

namespace App\Http\Livewire\Admin;

use App\Models\Aliance;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminEditAlianzaComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $link;
    public $status;
    public $image;

    public $newimage;
    public $aliance_id;


    public function mount($alianzas_name)
    {
        $aliance = Aliance::where('name',$alianzas_name)->first();

        $this->name =$aliance->name;
        $this->link =$aliance->link;
        $this->status=$aliance->status;

        $this->image =$aliance->image;
        $this->aliance_id = $aliance->id;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
        ]);
        if ($this->newimage)
        {
            $this->validateOnly($fields,[
                'newimage' => 'required'
            ]);
        }
    }

    public function updateAliance()
    {
        $this->validate([
            'name' => 'required',
        ]);

        if ($this->newimage)
        {
            $this->validate([
                'newimage' => 'required'
            ]);
        }

        $aliance = Aliance::find($this->aliance_id);

        $aliance->name =$this->name;
        $aliance->link =$this->link;
        $aliance->status= $this->status;

        if ($this->newimage)
        {
            unlink('assets/images/home/alianzas'.'/'.$aliance->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home/alianzas',$imageName);
            $aliance->image =$imageName;
        }


        $aliance->save();
        session()->flash('message','La Alianza se ha sido actualizado!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-alianza-component')->layout('layouts.base');
    }
}
