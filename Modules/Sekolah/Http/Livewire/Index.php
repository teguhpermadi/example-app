<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $id_, $namasekolah, $npsn, $bentukpendidikan, $alamat, $kelurahan, $kecamatan, $distrik, $provinsi, $kodepos, $lat, $lng, $telp, $email, $website, $logo;

    public function mount($data = null)
    {
        if(!is_null($data))
        {
            $this->id_ = $data->id;
            $this->namasekolah = $data->namasekolah;
            $this->npsn = $data->npsn;
            $this->bentukpendidikan = $data->bentukpendidikan;
            $this->alamat = $data->alamat;
            $this->kelurahan = $data->kelurahan;
            $this->kecamatan = $data->kecamatan;
            $this->distrik = $data->distrik;
            $this->provinsi = $data->provinsi;
            $this->kodepos = $data->kodepos;
            $this->lat = $data->lat;
            $this->lng = $data->lng;
            $this->telp = $data->telp;
            $this->email = $data->email;
            $this->website = $data->website;
            $this->logo = $data->logo;
        }
    }

    public function render()
    {
        return view('sekolah::livewire.index');
    }
}
