<?php

namespace Modules\UserModule\Repositories;

use Illuminate\Foundation\Auth\User;
use Modules\UserModule\Entities\CompanyAddress;

class CompanyRepository
{
    public function getAllUserCompanyAddress(User $user)
    {
        return  $user->companyAddress()->orderByDesc('created_at')->get();
    }
}
