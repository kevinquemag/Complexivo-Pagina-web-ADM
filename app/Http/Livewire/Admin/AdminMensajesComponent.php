<?php

namespace App\Http\Livewire\Admin;

use App\Models\Message;
use Livewire\Component;
use Livewire\WithPagination;

class AdminMensajesComponent extends Component
{
    use WithPagination;
    public function render()
    {
        $messages = Message::paginate(12);
        return view('livewire.admin.admin-mensajes-component',['messages'=>$messages])->layout('layouts.base');
    }
}
