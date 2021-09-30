<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;

class MapForm extends Component
{
    public $lat, $long;

    protected $listeners = ['dataLngLat'];

    public function render()
    {
        return view('livewire.sekolah.map-form');
    }

    // public function dehydrate()
    // {
    //     $data = [
    //         'long' => $this->long,
    //         'lat' => $this->lat,
    //     ];
    //     $this->emit('dataLocations', $data);
    // }

    public function dataLngLat($data)
    {
        // $this->long = $data->long;
        // $this->lat = $data->lat;
        $this->emit('dataMap', $data);
        // dd($data);
    }

}
