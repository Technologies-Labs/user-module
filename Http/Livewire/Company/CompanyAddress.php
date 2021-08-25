<?php

namespace Modules\UserModule\Http\Livewire\Company;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\UserModule\Repositories\CompanyRepository;
use Modules\UserModule\Services\CompanyAddressService;

class CompanyAddress extends Component
{
    public  $country;
    public  $city;
    public  $street;
    private $companyAddressService;
    public  $userCompanyAddress;
    private $companyRepository;

    public function __construct()
    {
        $this->companyRepository     = new CompanyRepository();
        $this->companyAddressService = new CompanyAddressService();
    }

    public function render()
    {
        $this->userCompanyAddress = $this->companyRepository->getAllUserCompanyAddress(Auth::user());
        return view('usermodule::livewire.company.company-address');
    }

    protected $rules = [
        'country' => 'required',
        'city'    => 'required',
        'street'  => 'required'
    ];

    public function createCompanyAddress()
    {
        $this->validate($this->rules);
        $this->companyAddressService ->setUserID  (Auth::user()->id)
                                     ->setCountry ($this->country)
                                     ->setCity    ($this->city)
                                     ->setStreet  ($this->street);
        $this->companyAddressService ->createCompanyAddress();
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->country = '';
        $this->city    = '';
        $this->street  = '';
    }
}
