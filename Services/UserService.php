<?php
namespace Modules\UserModule\Services;

use App\Models\User;
use App\Traits\ImageHelperTrait;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;
use Modules\UserModule\Enum\UserEnum;

use function PHPUnit\Framework\isNull;

class UserService{

    use UploadTrait , WithFileUploads , ImageHelperTrait;

    public $name;
    public $full_name;
    public $email;
    public $password;
    public $phone;
    public $image;
    public $logo;

    public function createUser(){

            return User::create(
            [
                'name'                =>$this->name,
                'full_name'           =>$this->full_name,
                'email'               =>$this->email,
                'password'            =>$this->password,
                'phone'               =>$this->phone,
                'image'               =>$this->image,
                'logo'                =>$this->logo

            ]
            );
    }

    public function updateUser(User $user)
    {
         $user->update(
            [
                'name'                =>($this->name??$user->name),
                'full_name'           =>($this->full_name??$user->full_name),
                'email'               =>($this->email??$user->email),
                'password'            =>($this->password??$user->password),
                'phone'               =>($this->phone??$user->phone),
                'image'               =>($this->image),
                'logo'                =>($this->logo??$user->logo)
            ]
        );
        return $user;

    }

     /**
     * @param mixed $name
     */
    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    /**
     * @param mixed $full_name
     */
    public function setFullName($full_name)
    {
        $this->full_name = $full_name;
        return $this;
    }

      /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

      /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = Hash::make($password);
        return $this;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
        return $this;
    }

    /**
     * @param mixed $image
     */
    public function setImage($image)
    {
        if(!$image){
            return $this;
        }
        if (is_string($image)) {
            $this->image = $image;
            return $this;
        }
        $this->image = UserEnum::USER_IMAGE_PATH.$this->uploadImageWithIntervention($image , 116 , 116 , UserEnum::USER_IMAGE_PATH)['name'];
        return $this;
    }

    /**
     * @param mixed $logo
     */
    public function setLogo($logo)
    {
        if(!$logo){
            return $this;
        }
        if (is_string($logo)) {
            $this->logo = $logo;
            return $this;
        }

        $this->logo = UserEnum::USER_IMAGE_PATH.$this->uploadImageWithIntervention($logo , 116 , 116 , UserEnum::USER_IMAGE_PATH)['name'];

        return $this;
    }

    /**
     * @param mixed $image
     */
    public function updateImg($image ,$old_image)
    {
        if($old_image === UserEnum::USER_DEFAULT_IMAGE){
            $this->image =$this->storeImage($image,UserEnum::USER_IMAGE_PATH);
        }else
        $this->image =$this->updateImage($image,UserEnum::USER_IMAGE_PATH,$old_image);

    }
    }
