<?php

namespace Modules\User\Http\Livewire\User;

use Livewire\Component;

class UserHeaderInformation extends Component
{
    public $user;
    public $product;

    public function render()
    {
        return view('user::livewire.user.user-header-information');
    }
}
