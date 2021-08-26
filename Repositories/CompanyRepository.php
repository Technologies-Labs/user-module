<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class CompanyRepository
{
    public function getAllCompanyStatistic(User $user)
    {
        return $user->companyStatistics()->orderBy('created_at')->get();
    }
}
