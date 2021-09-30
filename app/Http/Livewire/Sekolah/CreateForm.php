<?php

namespace App\Http\Livewire\Sekolah;

use App\Models\Sekolah;
use Livewire\Component;
use Illuminate\Support\Arr;

class CreateForm extends Component
{
    
    public $data, $dataIdentitas, $dataLocations, $dataMap;

    protected $listeners = ['parentComponentErrorBag', 'dataIdentitasSekolah', 'dataLocations', 'dataMap'];

    public function render()
    {
        return view('livewire.sekolah.create-form');
    }

    
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        // $this->emitSelf('parentComponentErrorBag');
        // $validatedData = $this->validate();
        // dd($this->locations);
        // Sekolah::create($validatedData);
        if(!is_null($this->dataMap)){
            // $this->dataMap = $data;
            $data = array_merge($this->dataIdentitas, $this->dataLocations, $this->dataMap);
        } else {
            $data = array_merge($this->dataIdentitas, $this->dataLocations);
        }
        Sekolah::create($data);
        
        // $this->data = $data;
        // dd($data);
    }

    public function parentComponentErrorBag($errorBag)
    {
        $this->setErrorBag($errorBag);
    }

    public function dataIdentitasSekolah($data)
    {
        $this->dataIdentitas = $data;
    }

    public function dataLocations($data)
    {
        if(!is_null($data))
        {
            $this->dataLocations = $data;
        } else {
            $this->dataLocations = [
                'provinsi' => null,
                'distrik' => null,
                'kecamatan' => null,
                'kelurahan' => null,
            ];
        }
    }

    public function dataMap($data)
    {
        $this->dataMap = $data;
        
        // dd($data);
    }

}
