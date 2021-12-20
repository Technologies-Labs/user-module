<?php

namespace Modules\User\Http\Livewire\User;

use App\Traits\ModalHelper;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Livewire\WithFileUploads;
use Modules\User\Services\UserService;

class UserInformation extends Component
{
    use ModalHelper , WithFileUploads;
    private $userService;

    public  $user;
    public  $name;
    public  $full_name;
    public  $email;
    public  $phone;
    public  $image;
    public  $logo;


    public  $password;
    public  $currentPassword;
    public  $newPassword;
    public  $confirmPassword;


    public function __construct()
    {
        $this->userService = new UserService();

        $this->user        = Auth::user();
        $this->name        = $this->user->name;
        $this->full_name   = $this->user->full_name ?? '';
        $this->email       = $this->user->email;
        $this->phone       = $this->user->phone ?? '';
        $this->image       = $this->user->image;
        $this->logo        = $this->user->logo;

    }

    public function render()
    {
        return view('user::livewire.user.user-information');
    }

    public function rules()
    {
        return [
            'name'            => 'required|string|unique:users,name,'.$this->user->id,
            'full_name'       => 'string',
            'email'           => 'required|email',
            'phone'           => 'int',
        ];
    }


    public function updateUserInfo()
    {

        $this->validate($this->rules());
        $this->userService ->setName     ($this->name)
                           ->setFullName ($this->full_name)
                           ->setEmail    ($this->email)
                           ->setPhone    ($this->phone)
                           ->setImage    ($this->image)
                           ->setLogo     ($this->logo)
                           ->updateUser  ($this->user);

        $this->modalClose('', 'success', "Your Information Updated Successfully", "Information Update");
        return null;

    }

}
