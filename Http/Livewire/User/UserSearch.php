<?php

namespace Modules\User\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserSearch extends Component
{
    public $user;
    public $users = [];

    public function render()
    {

        $user           = '%'.$this->user.'%';
        $this->users    = ($this->user) ? User::where('name' , 'like' , $user)->orWhere('full_name' , 'like' , $user)->get() : [];
        return view('user::livewire.user.user-search');
    }
}
