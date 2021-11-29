<?php

namespace Modules\UserModule\Http\Livewire\User;

use Livewire\Component;

class UserHeaderInformation extends Component
{
    public $user;
    public $product;

    public function render()
    {
        return view('usermodule::livewire.user.user-header-information');
    }
}
