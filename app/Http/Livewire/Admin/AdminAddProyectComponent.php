<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Carbon\Carbon;
use Livewire\WithFileUploads;

class AdminAddProyectComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $status;
    public $short_description;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }
    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'short_description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }

    public function addProject()
    {
        $this->validate([
            'name' => 'required',
            'short_description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $project = new Project();
        $project->name =$this->name;
        $project->status= $this->status;
        $project->short_description =$this->short_description;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home/proyectos',$imageName);
        $project->image =$imageName;

        $project->save();
        session()->flash('message','Proyecto creado con éxito!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-proyect-component')->layout('layouts.base');
    }
}
