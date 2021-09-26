<?php

namespace App\Http\Livewire\Sekolah;

use Laravolt\Indonesia\Models\Kelurahan;
use Livewire\Component;

use Http;

class LocationForm extends Component
{
    public $provinsi, $distrik, $kecamatan, $kelurahan, $kodepos;
    // public $dataProvinsi, $dataDistrik, $dataKecamatan, $dataKelurahan;
    public $selectedProvinsi = null;
    public $selectedDistrik = null;
    public $selectedKecamatan = null;
    public $selectedKelurahan = null;

    public function mount($selectedKelurahan = 1)
    {
        $this->provinsi = \Indonesia::allProvinces();
        $this->distrik = collect();
        $this->kecamatan = collect();
        $this->selectedKelurahan = $selectedKelurahan;

        // dd($this->provinsi);

        if (!is_null($selectedKelurahan)) {
            $kelurahan = Kelurahan::findOrFail($selectedKelurahan);
            // ddd($kelurahan);
            if ($kelurahan) {
                $this->provinsi = \Indonesia::findVillage($selectedKelurahan,  ['province', 'city', 'district', 'district.city', 'district.city.province']);
                ddd($this->provinsi );
        //         $this->states = State::where('country_id', $city->state->country_id)->get();
        //         $this->selectedCountry = $city->state->country_id;
        //         $this->selectedState = $city->state_id;
            }
        }
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
