<?php

namespace App\Http\Livewire\Admin;

use App\Models\Notice;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminAddNoticeComponent extends Component
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
            'slug' => 'required|unique:notices',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
    }
    public function addNotice()
    {
        $this->validate([
            'name' => 'required',
            'slug' => 'required|unique:notices',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|mimes:jpeg,png,jpg',
        ]);
        $notice = new Notice();
        $notice->name =$this->name;
        $notice->slug =$this->slug;
        $notice->status= $this->status;
        $notice->short_description =$this->short_description;
        $notice->description =$this->description;

        $imageName = Carbon::now()->timestamp. '.' . $this->image->extension();
        $this->image->storeAs('home/noticias',$imageName);
        $notice->image =$imageName;

        $notice->save();
        session()->flash('message','Noticia creada con éxito!');
    }
    public function render()
    {
        return view('livewire.admin.admin-add-notice-component')->layout('layouts.base');
    }
}
