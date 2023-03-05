<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Gallery;


class GaleriaComponent extends Component
{
    public function render()
    {
        $listaimg1 = Gallery::where([['type', 0], ['status', 1]])->get();
        $listaimg2 = Gallery::where([['type', 1], ['status', 1]])->get();
        $listaimg3 = Gallery::where([['type', 2], ['status', 1]])->get();
        $listaimg4 = Gallery::where([['type', 3], ['status', 1]])->get();
        $listaimg5 = Gallery::where([['type', 4], ['status', 1]])->get();
        $listaimg6 = Gallery::where([['type', 5], ['status', 1]])->get();
        return view('livewire.galeria-component',['listaimg1'=>$listaimg1, 'listaimg2'=>$listaimg2,'listaimg3'=>$listaimg3,'listaimg4'=>$listaimg4,'listaimg5'=>$listaimg5,'listaimg6'=>$listaimg6,])->layout('layouts.base');
    }
}