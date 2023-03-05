<?php

namespace App\Http\Livewire\Admin;

use App\Models\Gallery;
use Livewire\Component;
use Livewire\WithPagination;

class AdminGaleriaComponent extends Component
{
    use WithPagination;

    public $type;

    public $types = [
        0 => 'Carousel0',
        1 => 'Carousel1',
        2 => 'Carousel2',
        3 => 'Carousel3',
        4 => 'Carousel4',
        5 => 'Carousel5',
        
    ];

    private $galleries = [];

    public function mount()
    {
        $this->type = 0;
    }



    public function deleteGaller($id)
    {
        $galler = Gallery::find($id);
        $galler->delete();
        session()->flash('message','La imagen ha sido borrada exitosamente!');
    }
    
    public function render()
    {
        $this->galleries = Gallery::where([['type', $this->type]])->paginate(4);
        return view('livewire.admin.admin-galeria-component', ['galleries' => $this->galleries])->layout('layouts.base');
    }
}
