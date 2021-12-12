<?php

namespace Modules\UserModule\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;
use Modules\MarketplaceModule\Entities\Service;
use Modules\MarketplaceModule\Entities\Subscription;
use Modules\MarketPlaceModule\Enum\MarketplaceEnum;

class SuggestedUsers extends Component
{
    public $users;
    public $template;
    public function mount()
    {
        $users = app('services')->getUsersInServices(MarketplaceEnum::SUGGESTED_USERS)->users;
        $this->users = $users->random($users->count()/2);
    }

    public function render()
    {
        return view('usermodule::livewire.user.suggested-users-'.$this->template);
    }
}
