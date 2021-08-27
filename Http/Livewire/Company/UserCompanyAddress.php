<?php

namespace Modules\UserModule\Http\Livewire\Company;

use Livewire\Component;
use Modules\UserModule\Services\CompanyAddressService;
use \Modules\UserModule\Entities\CompanyAddress;

class UserCompanyAddress extends Component
{
    public  $address;
    public  $country;
    public  $city;
    public  $street;
    public  $companyAddressID;
    private $companyAddressService;

    public function mount()
    {
        $this->companyAddressID = $this->address->id;
        $this->country          = $this->address->country;
        $this->city             = $this->address->city;
        $this->street           = $this->address->street;
    }

    public function render()
    {
        return view('usermodule::livewire.company.user-company-address');
    }

    protected $rules = [
        'country' => 'required',
        'city'    => 'required',
        'street'  => 'required'
    ];

    public function updateCompanyAddress()
    {
        $this->companyAddressService = new CompanyAddressService();
        $companyAddress              = CompanyAddress::find($this->companyAddressID);
        if(!$companyAddress){
            session()->flash('message', 'not found company address');
            return ;
        }

        $this->validate($this->rules);
        $this->companyAddressService ->setCountry ($this->country)
                                     ->setCity    ($this->city)
                                     ->setStreet  ($this->street);
        $this->companyAddressService ->updateCompanyAddress($this->address);
        session()->flash('message', 'your company address updated successfully');
    }

    public function deleteCompanyAddress()
    {
        $this->address->delete();
        session()->flash('message', 'your company address deleted successfully');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->country = '';
        $this->city    = '';
        $this->street  = '';
    }
}
