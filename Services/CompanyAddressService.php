<?php

namespace Modules\UserModule\Services;

use Modules\UserModule\Entities\CompanyAddress;

class CompanyAddressService
{
    public $user_id;
    public $country;
    public $city;
    public $street;

    public function createCompanyAddress()
    {
        return CompanyAddress::create(
            [
                'user_id' => $this->user_id,
                'country' => $this->country,
                'city'    => $this->city,
                'street'  => $this->street
            ]
        );
    }

    public function updateCompanyAddress(CompanyAddress $companyAddress)
    {
        $companyAddress->update(
            [
                'country' => $this->country,
                'city'    => $this->city,
                'street'  => $this->street
            ]
        );

        return CompanyAddress::find($companyAddress->id);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setCountry($country)
    {
        $this->country = $country;
        return  $this;
    }

    public function setCity($city)
    {
        $this->city = $city;
        return $this;
    }

    public function setStreet($street)
    {
        $this->street = $street;
        return $this;
    }

    /**
     * get user_id
     */
    public function getUserID(): int
    {
        return $this->user_id;
    }

    /**
     * get country
     */
    public function getCountry(): string
    {
        return $this->country;
    }

    /**
     * get city
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * get Street
     */
    public function getStreet(): string
    {
        return $this->street;
    }
}
