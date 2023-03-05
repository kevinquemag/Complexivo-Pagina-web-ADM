<?php

namespace App\Http\Livewire\Contactos;

use App\Models\Message;
use Livewire\Component;

class EncuentranosComponent extends Component
{
    public $name;
    public $email;
    public $phone;
    public $province;
    public $comment;

    public function updated($fields)
    {
        $this->validateOnly($fields,[
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'province'=>'required',
            'comment'=>'required'
        ]);
    }

    public function sendMessage()
    {
        $this->validate([
            'name'=>'required',
            'email'=>'required|email',
            'phone'=>'required',
            'province'=>'required',
            'comment'=>'required'
        ]);

        $message = new Message();
        $message->name = $this->name;
        $message->email = $this->email;
        $message->phone = $this->phone;
        $message->province = $this->province;
        $message->comment = $this->comment;
        $message->save();
        session()->flash('message','Thamks, Your message has been sent successfully!');
        $this->name = "";
        $this->email = "";
        $this->phone = "";
        $this->province = "";
        $this->comment = "";
    }
    public function render()
    {
        return view('livewire.contactos.encuentranos-component')->layout('layouts.base');
    }
}
