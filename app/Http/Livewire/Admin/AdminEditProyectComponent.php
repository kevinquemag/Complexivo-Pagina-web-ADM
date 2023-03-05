<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditProyectComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $status;
    public $short_description;
    public $image;

    public $newimage;
    public $project_id;


    public function mount($proyectos_name)
    {
        $project = Project::where('name',$proyectos_name)->first();
        
        $this->name =$project->name;
        $this->status=$project->status;

        $this->short_description =$project->short_description;

        $this->image =$project->image;
        $this->project_id = $project->id;
    }


    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'short_description' => 'required',
        ]);
        if ($this->newimage) 
        {
            $this->validateOnly($fields,[
                'newimage' => 'required'
            ]);
        }
    }

    public function updateProject()
    {
        $this->validate([
            'name' => 'required',
            'short_description' => 'required',
        ]);

        if ($this->newimage) 
        {
            $this->validate([
                'newimage' => 'required'
            ]);
        }

        $project = Project::find($this->project_id);

        $project->name =$this->name;
        $project->status= $this->status;
        $project->short_description =$this->short_description;

        if ($this->newimage) 
        {   
            unlink('assets/images/home/proyectos'.'/'.$project->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home/proyectos',$imageName);
            $project->image =$imageName;
        }


        $project->save();
        session()->flash('message','El Proyecto ha sido actualizado!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-proyect-component')->layout('layouts.base');
    }
}
