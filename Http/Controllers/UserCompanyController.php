<?php

namespace Modules\UserModule\Http\Controllers;

use App\Models\User;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Repositories\CompanyRepository;

class UserCompanyController extends Controller
{
    private $companyRepository;
    public function __construct()
    {
        $this->companyRepository = new CompanyRepository();

    }
    public function getUserCompany(User $user)
    {
        $banner         = $this->companyRepository->getCompanyInfo($user);
        $services       = $user->companyServices;
        $statistics     = $user->companyStatistics;
        $customerSays   = $user->companyCustomerSays;

        return view('usermodule::website.company.user-company' , compact('banner','customerSays','services','statistics'));
    }
}
