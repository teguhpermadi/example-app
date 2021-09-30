<?php

namespace App\Http\Livewire\Sekolah;

use Livewire\Component;

class IdentitasSekolah extends Component
{
    public $namasekolah, $npsn, $bentukpendidikan, $alamat;

    public function render()
    {
        return view('livewire.sekolah.identitas-sekolah');
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

        $this->emit('dataIdentitasSekolah', $data);
    }

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

}
