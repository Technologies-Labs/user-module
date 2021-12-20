<?php

namespace Modules\User\Http\Livewire\User;

use App\Traits\ModalHelper;
use Auth;
use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use Modules\User\Services\UserService;

class UserPassword extends Component
{
    use ModalHelper;

    public  $user;
    private  $userService;

    public  $password;
    public  $currentPassword;
    public  $newPassword;
    public  $confirmPassword;


    public function __construct()
    {
        $this->user        = Auth::user();
        $this->password    = $this->user->password;
        $this->userService = new UserService();
    }

    public function render()
    {
        return view('user::livewire.user.user-password');
    }

    protected $rules = [
        //'password'        => 'required',
        'currentPassword' => 'required',
        'newPassword'     => 'required|min:8',
        'confirmPassword' => 'required'
    ];

    public function updatePassword()
    {
        $this->validate($this->rules);
        if (!Hash::check($this->currentPassword, $this->password)) {
            $this->modalClose('', 'error', "Your password is incorrect. Try again.", "password incorrect");
            return null;
        }
        if($this->newPassword != $this->confirmPassword){
            $this->modalClose('', 'error', "Those passwords didn’t match. Try again.", "password incorrect");
            return null;
        }
        $this->userService->setPassword($this->newPassword);
        $this->userService->updateUser($this->user);
        $this->modalClose('', 'success', "Your Password Updated Successfully", "Password Update");

    }
}
