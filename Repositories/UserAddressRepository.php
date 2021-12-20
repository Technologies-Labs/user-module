<?php

namespace Modules\User\Repositories;

use App\Models\User;
use Modules\User\Entities\CompanyAddress;

class UserAddressRepository
{
    public function getUserAddresses(User $user)
    {
        return  $user->companyAddress()->orderByDesc('created_at')->get();
    }
}
