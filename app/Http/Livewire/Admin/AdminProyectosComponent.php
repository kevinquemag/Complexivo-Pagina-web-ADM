<?php

namespace App\Http\Livewire\Admin;

use App\Models\Project;
use Livewire\Component;
use Livewire\WithPagination;

class AdminProyectosComponent extends Component
{
    use WithPagination;
    public function deleteProject($id)
    {
        $project = Project::find($id);
        if ($project->image) 
        {
            unlink('assets/images//home/proyectos'.'/'.$project->image);
        }

        $project->delete();
        session()->flash('message','El Proyecto ha sido borrado exitosamente!');
    }
    public function render()
    {
        $projects = Project::orderBy('id','DESC')->paginate(4);
        return view('livewire.admin.admin-proyectos-component',['projects'=>$projects])->layout('layouts.base');
    }
}
