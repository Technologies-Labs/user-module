<?php

namespace Modules\UserModule\Http\Livewire;

use Livewire\Component;
use Modules\UserModule\Entities\Brand;
use Modules\UserModule\Entities\Trademark;

class LogoBrands extends Component
{
    public $logos;

    public function mount()
    {
        $this->logos = Brand::all();
    }
    public function render()
    {
        return view('usermodule::livewire.logo-brands');
    }
}
