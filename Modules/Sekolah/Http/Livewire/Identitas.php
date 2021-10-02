<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;
use Modules\Sekolah\Entities\Sekolah;

class Identitas extends Component
{
    public $namasekolah, $npsn, $bentukpendidikan, $alamat;

    public function mount($data = null)
    {
        if(!is_null($data))
        {
            $this->namasekolah = $data->namasekolah;
            $this->npsn = $data->npsn;
            $this->bentukpendidikan = $data->bentukpendidikan;
            $this->alamat = $data->alamat;
        }
    }

    public function render()
    {
        return view('sekolah::livewire.identitas');
    }

    protected $rules = [
        'namasekolah' => 'required',
        'npsn' => 'numeric',
        'bentukpendidikan' => 'required',
        'alamat' => 'required',
    ];

    protected $validationAttributes = [
        'namasekolah' => 'nama sekolah',
        'bentukpendidikan' => 'bentuk pendidikan',
    ];

    public function dehydrate()
    {
        $this->emit('parentComponentErrorBag', $this->getErrorBag());
        
        $data = [
            'namasekolah' => $this->namasekolah, 
            'npsn' => $this->npsn, 
            'bentukpendidikan' => $this->bentukpendidikan, 
            'alamat' => $this->alamat
        ];

        $this->emit('dataIdentitas', $data);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

}
