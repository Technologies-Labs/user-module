<?php

namespace Modules\UserModule\Services;

use Modules\UserModule\Entities\CompanyAddress;

class CompanyAddressService
{
    public $user_id;
    public $address;
    public $phones;

    public function createCompanyAddress()
    {
        return CompanyAddress::create(
            [
                'user_id'   => $this->user_id,
                'address'   => $this->address,
                'phones'    => $this->phones,
            ]
        );
    }

    public function updateCompanyAddress(CompanyAddress $companyAddress)
    {
        return $companyAddress->update(
            [
                'address'   => $this->address,
                'phones'    => $this->phones,
            ]
        );
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setPhones($phones)
    {
        $this->phones = $phones;
        return  $this;
    }

    public function setAddress($address)
    {
        $this->address = $address;
        return $this;
    }
}
