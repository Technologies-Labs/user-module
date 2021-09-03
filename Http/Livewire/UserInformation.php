<?php

namespace Modules\UserModule\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Modules\UserModule\Services\UserService;

class UserInformation extends Component
{
    public  $user;
    public  $name;
    public  $full_name;
    public  $email;
    public  $phone;
    public  $password;
    public  $currentPassword;
    public  $newPassword;
    public  $confirmPassword;
    private $userService;

    public function __construct()
    {
        $this->user        = Auth::user();
        $this->name        = $this->user->name;
        $this->full_name   = $this->user->full_name;
        $this->email       = $this->user->email;
        $this->phone       = $this->user->phone;
        $this->password    = $this->user->password;
        $this->userService = new UserService();
    }

    public function render()
    {
        return view('usermodule::livewire.user-information');
    }

    protected $rules = [
        'name'            => 'required|string',
        'full_name'       => 'required|string',
        'email'           => 'required|email',
        'phone'           => 'required|int',
        'password'        => 'required',
        'currentPassword' => 'required',
        'newPassword'     => 'required|min:8',
        'confirmPassword' => 'required'
    ];

    public function updateUserInfo()
    {
        $this->validate($this->rules);
        $this->userService ->setName     ($this->name)
                           ->setFullName ($this->full_name)
                           ->setEmail    ($this->email)
                           ->setPhone    ($this->phone);
        $this->userService ->updateUser  ($this->user);
    }

    public function updatePassword()
    {
        $this->validate($this->rules);

        if (Hash::check($this->currentPassword , $this->password))
        {
            if ($this->newPassword == $this->confirmPassword)
            {
                $this->userService ->setPassword($this->newPassword);
                $this->userService ->updateUser ($this->user);
            }
            else {
                session()->flash('confirmPassword', 'Those passwords didn’t match. Try again.');
                return ;
            }
        }
        else {
            session()->flash('currentPassword', 'Your password is incorrect. Try again.');
            return ;
        }
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->currentPassword = '';
        $this->newPassword     = '';
        $this->confirmPassword = '';
    }
}
