<?php

namespace App\Http\Livewire\Admin;

use App\Models\Notice;
use Livewire\Component;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;

class AdminEditNoticeComponent extends Component
{
    use WithFileUploads;

    public $name;
    public $slug;
    public $status;
    public $short_description;
    public $description;
    public $image;

    public $newimage;
    public $notice_id;


    public function mount($noticias_slug)
    {
        $notice = Notice::where('slug',$noticias_slug)->first();
        
        $this->name =$notice->name;
        $this->slug =$notice->slug;
        $this->status=$notice->status;

        $this->short_description =$notice->short_description;
        $this->description =$notice->description;

        $this->image =$notice->image;
        $this->notice_id = $notice->id;
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

    public function updateNotice()
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

        $notice = Notice::find($this->notice_id);

        $notice->name =$this->name;
        $notice->slug =$this->slug;
        $notice->status= $this->status;
        $notice->short_description =$this->short_description;
        $notice->description =$this->description;

        if ($this->newimage) 
        {   
            unlink('assets/images/home/noticias'.'/'.$notice->image);
            $imageName = Carbon::now()->timestamp. '.' . $this->newimage->extension();
            $this->newimage->storeAs('home/noticias',$imageName);
            $notice->image =$imageName;
        }


        $notice->save();
        session()->flash('message','La noticia ha sido actualizado!');
    }
    public function render()
    {
        return view('livewire.admin.admin-edit-notice-component')->layout('layouts.base');
    }
}
