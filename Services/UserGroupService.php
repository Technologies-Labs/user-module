<?php

namespace Modules\UserModule\Services;

use App\Models\User;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Group;
use Modules\UserModule\Enum\UserEnum;

class UserGroupService
{
    use WithFileUploads;

    public $user;
    public $name;
    public $description;
    public $image;
    public $is_public;

    public function createUserGroup()
    {
        $userGroup = Group::create(
            [
                'group_name'            => $this->name,
                'group_description'     => $this->description,
                'group_image'           => $this->image,
                'is_public'             => $this->is_public
            ]);

        $userGroup->supervisors()->attach($this->user->id , ['is_owner' => 1]);

        return response()->json([
            'success'       => ($userGroup) ? true : false,
            'message'       => ($userGroup) ? 'User Group created successfully' : 'User Group Failed created',
        ]);
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setDescription($description)
    {
        $this->description = $description;
        return $this;
    }

    public function setImage($image)
    {
        if($image)
        {
            $this->image = $image->store('/','user_group_images');
        } else
        {
            $this->image = UserEnum::USER_GROUP_DEFAULT_IMAGE;
        }

        return $this;
    }

    public function setIsPublic($isPublic)
    {
        $this->is_public = $isPublic;
        return $this;
    }


}
