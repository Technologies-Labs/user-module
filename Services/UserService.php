<?php
namespace Modules\UserModule\Services;

use App\Models\User;
use App\Traits\UploadTrait;
use Illuminate\Support\Facades\Hash;
use Modules\UserModule\Enum\UserEnum;

use function PHPUnit\Framework\isNull;

class UserService{

    use UploadTrait;

    public $nama;
    public $email;
    public $password;
    public $phone;
    public $image;

    public function createUser(){

            return User::create(
            [
                'name'                =>$this->name,
                'email'               =>$this->email,
                'password'            =>$this->password,
                'phone'               =>$this->phone,
                'image'               =>$this->image,

            ]
            );
    }

    public function updateUser(User $user)
    {
         $user->update(
            [
                'name'                =>$this->name,
                'email'               =>$this->email,
                'password'            =>($this->password??$user->password),
                'phone'               =>$this->phone,
                'image'               =>($this->image??$user->image),
            ]
        );
        return User::find($user->id);

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
        if(isNull($image) ){
            $this->image=UserEnum::USER_DEFAULT_IMAGE;
        }else
        $this->image =$this->storeImage($image,UserEnum::USER_IMAGE_PATH);
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
