<?php

namespace Modules\Users\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $users;

    public function mount($users = null)
    {
        if(!is_null($users))
        {
            $this->users = $users;
        }
    }

    public function render()
    {
        return view('users::livewire.index');
    }
}
