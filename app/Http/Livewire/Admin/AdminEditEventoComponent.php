<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditEventoComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $status;
    public $short_description;
    public $description;
    public $image;

    public $newimage;
    public $event_id;


    public function mount($eventos_slug)
    {
        $event = Event::where('slug',$eventos_slug)->first();
        
        $this->name =$event->name;
        $this->slug =$event->slug;
        $this->status=$event->status;

        $this->short_description =$event->short_description;
        $this->description =$event->description;

        $this->image =$event->image;
        $this->event_id = $event->id;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);
        if ($this->newimage) 
        {
            $this->validateOnly($fields,[
                'newimage' => 'required'
            ]);
        }
    }

    public function updateEvent()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required',
            'short_description' => 'required',
            'description' => 'required',
        ]);

        if ($this->newimage) 
        {
            $this->validate([
                'newimage' => 'required'
            ]);
        }

        $event = Event::find($this->event_id);

        $event->name =$this->name;
        $event->slug =$this->slug;
        $event->status= $this->status;
        $event->short_description =$this->short_description;
        $event->description =$this->description;

        if ($this->newimage) 
        {   
            unlink('assets/images/home/eventos'.'/'.$event->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home/eventos',$imageName);
            $event->image =$imageName;
        }


        $event->save();
        session()->flash('message','El Evento ha sido actualizado!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-evento-component')->layout('layouts.base');
    }
}
