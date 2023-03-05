<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Livewire\WithPagination;

class AdminEventosComponent extends Component
{
    use WithPagination;

    public function deleteEvent($id)
    {
        $event = Event::find($id);
        if ($event->image) 
        {
            unlink('assets/images//home/eventos'.'/'.$event->image);
        }

        $event->delete();
        session()->flash('message','El evento ha sido borrado exitosamente!');
    }

    public function render()
    {
        $events = Event::orderBy('id','DESC')->paginate(4);
        return view('livewire.admin.admin-eventos-component',['events'=>$events])->layout('layouts.base');
    }
}
