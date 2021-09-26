<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;
use Http;

class LocationForm extends Component
{
    public $provinsi, $distrik, $kecamatan, $kelurahan, $kodepos;
    public $dataProvinsi;
    public $dataDistrik = [], $dataKecamatan = [], $dataKelurahan = [];

    public function mount()
    {
        $response = Http::get('https://teguhpermadi.github.io/api-wilayah-indonesia/api/provinces.json');
        $collection = json_decode($response);
        $this->dataProvinsi = collect($collection)->all();
        // dd($this->dataProvinsi);
    }

    public function render()
    {
        return view('livewire.sekolah.location-form');
    }

    protected $rules = [
        'provinsi' => 'required',
        'distrik' => 'required',
        'kecamatan' => 'required',
        'kelurahan' => 'required',
        'kodepos' => 'numeric',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function updatedProvinsi($state)
    {
        // ketika dropdown provinsi di pilih
        // dd($state);
        if (!is_null($state)) {
            $response = Http::get('https://teguhpermadi.github.io/api-wilayah-indonesia/api/regencies/'.$state.'.json');
            $collection = json_decode($response);
            $this->dataDistrik = collect($collection)->all();
            // dd($this->dataDistrik);
        }

    }  
}
