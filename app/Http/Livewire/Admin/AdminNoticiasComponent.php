<?php

namespace App\Http\Livewire\Admin;

use App\Models\Notice;
use Livewire\Component;
use Livewire\WithPagination;

class AdminNoticiasComponent extends Component
{
    use WithPagination;
    public function deleteNotice($id)
    {
        $notice = Notice::find($id);
        if ($notice->image) 
        {
            unlink('assets/images//home/noticias'.'/'.$notice->image);
        }

        $notice->delete();
        session()->flash('message','La Noticia ha sido borrado exitosamente!');
    }
    public function render()
    {
        $notices = Notice::orderBy('id','DESC')->paginate(4);
        return view('livewire.admin.admin-noticias-component',['notices'=>$notices])->layout('layouts.base');
    }
}
