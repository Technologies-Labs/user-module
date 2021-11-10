<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;
use Modules\UserModule\Entities\CompanyAddress;

class UserAddressRepository
{
    public function getUserAddresses(User $user)
    {
        return  $user->companyAddress()->orderByDesc('created_at')->get();
    }
}
