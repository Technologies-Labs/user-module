<?php

namespace Modules\UserModule\Http\Livewire\User;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\UserModule\Enum\UserStatusEnum;
use Modules\UserModule\Repositories\UserStatusRepository;

class Slide extends Component
{
    private $userStatusRepository;
    public  $users;
    public  $currantUser;

    public function __construct()
    {
        $this->userStatusRepository = new UserStatusRepository();
        $this->currantUser          = Auth::user();
    }

    public function render()
    {
        $this->users = $this->userStatusRepository->getAllUserByStatus(UserStatusEnum::TRUST);
        return view('usermodule::livewire.user.slide');
    }
}
