<?php

namespace Modules\User\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Modules\Product\Entities\Product;

class UserSearch extends Component
{
    public $type = "user";
    public $search;
    public $users = [];
    public $products = [];

    public function render()
    {
        return view('user::livewire.user.user-search');
    }

    public function getSearch()
    {
        $this->users        = ($this->search && $this->type == "user") ? User::search($this->search)->get() : [];
        $this->products     = ($this->search && $this->type == "product") ? Product::search($this->search)->get() : [];

    }
}

