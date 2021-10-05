<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;
use Modules\Sekolah\Entities\Sekolah;
use Laravolt\Indonesia\Models\Kelurahan;
use Laravolt\Indonesia\Models\Kecamatan;
use Laravolt\Indonesia\Models\City;
use Laravolt\Indonesia\Models\District;
use Laravolt\Indonesia\Models\Village;

class Form extends Component
{
    public $uuid;
    public $namasekolah, $npsn, $bentukpendidikan, $alamat;
    public $allProvinsi, $allDistrik, $allKecamatan, $allKelurahan, $kodepos;
    public $selectedProvinsi = null;
    public $selectedDistrik = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;
    public $lat, $lng;
    public $telp, $email, $website;

    protected $listeners = ['dataLngLat'];

    public function mount($data = null)
    {
        $this->allProvinsi = \Indonesia::allProvinces();
        $this->allDistrik = collect();
        $this->allKecamatan = collect();
        $this->allKelurahan = collect();
        $this->selectedKelurahan = collect();

        if(!is_null($data))
        {
            $this->uuid = $data->uuid;
            $this->namasekolah = $data->namasekolah;
            $this->npsn = $data->npsn;
            $this->bentukpendidikan = $data->bentukpendidikan;
            $this->alamat = $data->alamat;

            $kelurahan = \Indonesia::findVillage($data->kelurahan, $with = ['district','city','province']);
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
            $this->kodepos = $data->kodepos;
            $this->lat = $data->lat;
            $this->lng = $data->lng;
            $this->telp = $data->telp;
            $this->email = $data->email;
            $this->website = $data->website;
        }
    }

    public function render()
    {
        return view('sekolah::livewire.form');
    }

    protected $rules = [
        'namasekolah' => 'required',
        'npsn' => 'numeric',
        'bentukpendidikan' => 'required',
        'alamat' => 'required',
        'selectedProvinsi' => 'required',
        'selectedDistrik' => 'required',
        'selectedKecamatan' => 'required',
        'selectedKelurahan' => 'required',
        'kodepos' => 'numeric|required',
        'telp' => 'numeric',
        'email' => 'email:rfc',
        'website' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
    ];

    protected $validationAttributes = [
        'namasekolah' => 'nama sekolah',
        'bentukpendidikan' => 'bentuk pendidikan',
        'selectedProvinsi' => 'provinsi',
        'selectedDistrik' => 'distrik',
        'selectedKecamatan' => 'kecamatan',
        'selectedKelurahan' => 'kelurahan',
        'kodepos' => 'kode pos',
        'telp' => 'telpon',
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

    public function dataLngLat($data)
    {
        $this->lat = $data['lat'];
        $this->lng = $data['lng'];
        // dd($data['lat']);
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
            'lat' => $this->lat,
            'lng' => $this->lng,
            'telp' => $this->telp,
            'email' => $this->email,
            'website' => $this->website,
        ];
        
        Sekolah::updateOrCreate(['uuid' => $this->uuid], $data);
        
        // dd($data);
        return redirect()->route('sekolah.index');
    }
}
