<?php


namespace Modules\UserModule\Repositories;

use App\Models\User;
use Modules\UserModule\Entities\UserContactUs;

class UserContactUsRepository
{
    public function getUserContactUs(User $user)
    {
        if($user->contact == null){
            return UserContactUs::create([
                'user_id' =>  $user->id
            ]);
        }
        return $user->contact;
    }


}
