<?php

namespace Modules\UsersManagement\Http\Livewire;

use Livewire\Component;

class Index extends Component
{
    public $users;

    public function mount($data = null)
    {
        $this->users = $data;
    }

    public function render()
    {
        return view('usersmanagement::livewire.index');
    }
}
