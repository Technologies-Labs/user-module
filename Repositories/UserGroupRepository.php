<?php


namespace Modules\UserModule\Repositories;


use App\Models\User;

class UserGroupRepository
{
    public function getAllUserGroup($user_id)
    {
        return User::where('id' , $user_id)->with(['supervisorGroups' , 'ownerGroups' , 'groups'])->get();
    }
}
