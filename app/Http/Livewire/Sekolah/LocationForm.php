<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;
use Laravolt\Indonesia\Models\Kelurahan;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class LocationForm extends Component
{
    public $allProvinsi, $allDistrik, $allKecamatan, $allKelurahan, $kodepos;
    // public $dataProvinsi, $dataDistrik, $dataKecamatan, $dataKelurahan;
    public $selectedProvinsi = null;
    public $selectedDistrik = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = null)
    {
        $this->allProvinsi = \Indonesia::allProvinces();
        $this->allDistrik = collect();
        $this->allKecamatan = collect();
        $this->allKelurahan = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        if (!is_null($selectedKelurahan)) {
            $kelurahan = \Indonesia::findVillage($selectedKelurahan, $with = ['district','city','province']);
            // dd($kelurahan);
            if ($kelurahan) {
                $this->allKelurahan = Kelurahan::where('district_code', $kelurahan->district_code)->get();
                $this->allKecamatan = Kecamatan::where('city_code', $kelurahan->district->city_code)->get(); 
                $this->allDistrik = City::where('province_code', $kelurahan->city->province_code)->get();
                $this->allProvinsi = \Indonesia::allProvinces();
                $this->selectedKelurahan = $kelurahan->code;
                $this->selectedKecamatan = $kelurahan->district->code;
                $this->selectedDistrik = $kelurahan->city->code;
                $this->selectedProvinsi = $kelurahan->province->code;
            }
        }
    }

    public function render()
    {
        return view('livewire.sekolah.location-form');
    }

    // protected $rules = [
    //     'selectedProvinsi' => 'required',
    //     'selectedDistrik' => 'required',
    //     'selectedKecamatan' => 'required',
    //     'selectedKelurahan' => 'required',
    //     'kodepos' => 'numeric',
    // ];

    // public function updated($propertyName)
    // {
    //     $this->validateOnly($propertyName);
    // }

    public function updatedSelectedProvinsi($provinsi)
    {
        $this->allDistrik = City::where('province_code', $provinsi)->get();
        $this->selectedDistrik = null;
        $this->selectedKecamatan = null;
        $this->selectedKelurahan = null;
    }  

    public function updatedSelectedDistrik($distrik)
    {
        if (!is_null($distrik)) {
            $this->allKecamatan = District::where('city_code', $distrik)->get();
        }
        $this->selectedKelurahan = null;

    }

    public function updatedSelectedKecamatan($kecamatan)
    {
        if (!is_null($kecamatan)) {
            $this->allKelurahan = Village::where('district_code', $kecamatan)->get();
        }
    }

    public function updatedSelectedKelurahan($kelurahan)
    {
        $data = [
            'provinsi' => $this->selectedProvinsi,
            'distrik' => $this->selectedDistrik,
            'kecamatan' => $this->selectedKecamatan,
            'kelurahan' => $this->selectedKelurahan,
        ];
        
        $this->emit('dataLocations', $data);
    }
    
}
