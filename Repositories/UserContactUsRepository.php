<?php


namespace Modules\User\Repositories;

use App\Models\User;
use Modules\User\Entities\UserContactUs;

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
