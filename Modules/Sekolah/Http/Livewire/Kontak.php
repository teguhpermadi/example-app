<?php

namespace Modules\Sekolah\Http\Livewire;

use Livewire\Component;

class Kontak extends Component
{
    public $telp, $email, $website;

    public function mount($data = null)
    {
        if(!is_null($data))
        {
            // $this->telp = $data->telp;
            // $this->email = $data->email;
            // $this->website = $data->website;
        }
    }

    public function render()
    {
        return view('sekolah::livewire.kontak');
    }

    protected $rules = [
        'telp' => 'numeric',
        'email' => 'email:rfc',
        'website' => ['regex:/^(https?:\/\/)?([\da-z\.-]+)\.([a-z\.]{2,6})([\/\w \.-]*)*\/?$/'],
    ];

    protected $validationAttributes = [
        'telp' => 'telpon',
    ];


    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function dehydrate()
    {
        $this->emit('parentComponentErrorBag', $this->getErrorBag());
        $data = [
            'telp' => $this->telp,
            'email' => $this->email,
            'website' => $this->website,
        ];

        $this->emit('dataKontak', $data);
    }


}
