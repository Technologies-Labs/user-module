<?php

namespace Modules\UserModule\Services;

use Modules\UserModule\Entities\CompanyStatistic;

class CompanyStatisticService
{
    public $user_id;
    public $name;
    public $number;

    public function createCompanyStatistic()
    {
        $companyStatistic = CompanyStatistic::create(
            [
                'user_id' => $this->user_id,
                'name'    => $this->name,
                'number'  => $this->number
            ]
        );

        return response()->json([
            'success'       => ($companyStatistic) ? true : false,
            'message'       => ($companyStatistic) ? 'Company Statistic created successfully' : 'Company Statistic Failed created',
        ]);
    }

    public function updateCompanyStatistic(CompanyStatistic $companyStatistic)
    {
        $companyStatistic->update(
            [
                'name'   => $this->name,
                'number' => $this->number
            ]
        );

        return CompanyStatistic::find($companyStatistic->id);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setName($name)
    {
        $this->name = $name;
        return $this;
    }

    public function setNumber($number)
    {
        $this->number = $number;
        return $this;
    }

    /**
     * get user_id
     */
    public function getUserId(): int
    {
        return $this->user_id;
    }

    /**
     * get name
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * get number
     */
    public function getNumber(): int
    {
        return $this->number;
    }
}
