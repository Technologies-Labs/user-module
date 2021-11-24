<?php

namespace Modules\UserModule\Http\Livewire\User;

use App\Traits\ModalHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Services\UserService;

class UserInformation extends Component
{
    use ModalHelper ;
    private $userService;

    public  $user;
    public  $name;
    public  $full_name;
    public  $email;
    public  $phone;
    // public  $image;


    public  $password;
    public  $currentPassword;
    public  $newPassword;
    public  $confirmPassword;


    public function __construct()
    {
        $this->user        = Auth::user();
        $this->name        = $this->user->name;
        $this->full_name   = $this->user->full_name;
        $this->email       = $this->user->email;
        $this->phone       = $this->user->phone;
        // $this->image    = $this->user->image;
        $this->userService = new UserService();
    }

    public function render()
    {
        return view('usermodule::livewire.user.user-information');
    }


    protected $rules = [
        'name'            => 'required|string',
        'full_name'       => 'required|string',
        'email'           => 'required|email',
        'phone'           => 'required|int',
    ];

    public function updateUserInfo()
    {
        $this->validate($this->rules);
        $this->userService ->setName     ($this->name)
                           ->setFullName ($this->full_name)
                           ->setEmail    ($this->email)
                           ->setPhone    ($this->phone)
                           ->updateUser  ($this->user);
                           
        $this->modalClose('', 'success', "Your Information Updated Successfully", "Information Update");
        return null;

    }

}
