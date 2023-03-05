<?php

namespace App\Http\Livewire\Admin;

use App\Models\Event;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddEventoComponent extends Component
{
    use WithFileUploads;
    public $name;
    public $slug;
    public $status;
    public $short_description;
    public $description;
    public $image;

    public function mount()
    {
        $this->status = 0;
    }

    public function generateSlug()
    {
        $this->slug = Str::slug($this->name,'-');
    }

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name' => 'required',
            'slug' => 'required|unique:events',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }
    public function addEvent()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:events',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $event = new Event();
        $event->name =$this->name;
        $event->slug =$this->slug;
        $event->status= $this->status;
        $event->short_description =$this->short_description;
        $event->description =$this->description;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home/eventos',$imageName);
        $event->image =$imageName;

        $event->save();
        session()->flash('message','Evento creado con éxito!');
    }

    public function render()
    {
        return view('livewire.admin.admin-add-evento-component')->layout('layouts.base');
    }
}
