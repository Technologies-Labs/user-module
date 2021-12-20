<?php

namespace Modules\User\Repositories;

use Illuminate\Foundation\Auth\User;
use Modules\User\Entities\Company;
use Modules\User\Entities\CompanyAddress;

class CompanyRepository
{
    public function getCompanyInfo(User $user)
    {
        return  $user->companyInfo ?? Company::create(['user_id' => $user->id]);;
    }

    public function getAllUserCompanyAddress(User $user)
    {
        return  $user->companyAddress()->orderByDesc('created_at')->get();
    }
}
