<?php

namespace Modules\UserModule\Http\Livewire\Company;

use Livewire\Component;
use Modules\UserModule\Repositories\CompanyRepository;

class Slide extends Component
{
    private $companyRepository;
    public  $companies;

    public function __construct()
    {
        $this->companyRepository = new CompanyRepository();
    }

    public function render()
    {
        $this->companies = $this->companyRepository->getAllCompany();
        return view('usermodule::livewire.company.slide');
    }
}
