<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class UserStatusRepository
{
    public function getAllUserByStatus ($status)
    {
        return [
            'users' => User::where('status' , $status)->paginate(10)
        ];
    }
}
