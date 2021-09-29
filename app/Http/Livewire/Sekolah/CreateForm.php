<?php

namespace App\Http\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;
use Laravolt\Indonesia\Models\Kelurahan;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class CreateForm extends Component
{
    public $namasekolah, $npsn, $bentukpendidikan, $alamat;
    public $allProvinsi, $allDistrik, $allKecamatan, $allKelurahan, $kodepos;
    public $selectedProvinsi = null;
    public $selectedDistrik = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $long, $lat;

    protected $listeners = ['locations'];

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
        return view('livewire.sekolah.create-form');
    }

    protected $rules = [
        'namasekolah' => 'required|max:3',
        'npsn' => 'numeric',
        'bentukpendidikan' => 'required',
        'alamat' => 'required',
        'selectedProvinsi' => 'required',
        'selectedDistrik' => 'required',
        'selectedKecamatan' => 'required',
        'selectedKelurahan' => 'required',
        'kodepos' => 'numeric',
    ];

    protected $validationAttributes = [
        'namasekolah' => 'nama sekolah',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $this->validate();

        $data = [
            'namasekolah' => $this->namasekolah,
            'npsn' => $this->npsn,
            'bentukpendidikan' => $this->bentukpendidikan,
            'alamat' => $this->alamat,
            'provinsi' => $this->selectedProvinsi,
            'distrik' => $this->selectedDistrik,
            'kecamatan' => $this->selectedKecamatan,
            'kelurahan' => $this->selectedKelurahan,
            'kodepos' => $this->kodepos,
            'bujur' => $this->long,
            'lintang' => $this->lat,
        ];
        // dd($data);
        Sekolah::create($data);
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
        $data = \Indonesia::findVillage($kelurahan, $with = null);
        // dd($data);
    }

    public function locations($data)
    {
        $this->long = $data['long'];
        $this->lat = $data['lat'];
        // dd($this->long);
    }

}
