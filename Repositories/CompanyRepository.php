<?php

namespace Modules\UserModule\Repositories;

use Illuminate\Foundation\Auth\User;
use Modules\UserModule\Entities\Company;

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

    public function getAllCompany()
    {
        return [
            'companies' => Company::all()
        ];
    }
}
