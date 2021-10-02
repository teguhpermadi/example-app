<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;
use Laravolt\Indonesia\Models\Kelurahan;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class Lokasi extends Component
{
    public $allProvinsi, $allDistrik, $allKecamatan, $allKelurahan, $kodepos;
    public $selectedProvinsi = null;
    public $selectedDistrik = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = null)
    {
        // dd($selectedKelurahan->kelurahan);
        $this->allProvinsi = \Indonesia::allProvinces();
        $this->allDistrik = collect();
        $this->allKecamatan = collect();
        $this->allKelurahan = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        if (!is_null($selectedKelurahan)) {
            $kelurahan = \Indonesia::findVillage($selectedKelurahan->kelurahan, $with = ['district','city','province']);
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
            $this->kodepos = $selectedKelurahan->kodepos;
        }
    }

    public function render()
    {
        return view('sekolah::livewire.lokasi');
    }


    protected $rules = [
        'selectedProvinsi' => 'required',
        'selectedDistrik' => 'required',
        'selectedKecamatan' => 'required',
        'selectedKelurahan' => 'required',
        'kodepos' => 'numeric|required',
    ];

    protected $validationAttributes = [
        'selectedProvinsi' => 'provinsi',
        'selectedDistrik' => 'distrik',
        'selectedKecamatan' => 'kecamatan',
        'selectedKelurahan' => 'kelurahan',
        'kodepos' => 'kode pos',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

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
        
    }

    public function dehydrate()
    {
        $this->emit('parentComponentErrorBag', $this->getErrorBag());
        $data = [
            'provinsi' => $this->selectedProvinsi,
            'distrik' => $this->selectedDistrik,
            'kecamatan' => $this->selectedKecamatan,
            'kelurahan' => $this->selectedKelurahan,
        ];

        $this->emit('dataLokasi', $data);
    }
}
