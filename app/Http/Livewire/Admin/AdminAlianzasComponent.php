<?php

namespace App\Http\Livewire\Admin;

use App\Models\Aliance;
use Livewire\Component;
use Livewire\WithPagination;

class AdminAlianzasComponent extends Component
{
    use WithPagination;
    public function deleteAliance($id)
    {
        $aliance = Aliance::find($id);
        if ($aliance->image) 
        {
            unlink('assets/images//home/alianzas'.'/'.$aliance->image);
        }

        $aliance->delete();
        session()->flash('message','La Alianza ha sido borrado exitosamente!');
    }
    public function render()
    {
        $aliances = Aliance::orderBy('id','DESC')->paginate(10);
        return view('livewire.admin.admin-alianzas-component',['aliances'=> $aliances])->layout('layouts.base');
    }
}
