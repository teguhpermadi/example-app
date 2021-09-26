<?php

namespace App\Http\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;

class CreateForm extends Component
{
    public $namasekolah, $npsn, $bentukpendidikan, $alamat;

    protected $listeners = ['kodepos'];

    public function render()
    {
        return view('livewire.sekolah.create-form');
    }

    protected $rules = [
        'namasekolah' => 'required|max:3',
        'npsn' => 'numeric',
        'bentukpendidikan' => 'required',
        'alamat' => 'required',
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
        $validatedData = $this->validate();
        
        dd($validatedData);
        Sekolah::create($validatedData);
    }
}
