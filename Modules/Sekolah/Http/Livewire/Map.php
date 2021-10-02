<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;

class Map extends Component
{
    public $lat, $long;

    protected $listeners = ['dataLngLat'];

    public function render()
    {
        return view('sekolah::livewire.map');
    }
    
    public function dataLngLat($data)
    {
        $this->emit('dataMap', $data);
    }
}
