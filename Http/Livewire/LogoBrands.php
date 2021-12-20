<?php

namespace Modules\User\Http\Livewire;

use Livewire\Component;
use Modules\User\Entities\Brand;
use Modules\User\Entities\Trademark;

class LogoBrands extends Component
{
    public $logos;

    public function mount()
    {
        $this->logos = Brand::all();
    }
    public function render()
    {
        return view('user::livewire.logo-brands');
    }
}
