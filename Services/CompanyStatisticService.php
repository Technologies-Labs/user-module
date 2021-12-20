<?php

namespace Modules\User\Services;

use Modules\User\Entities\CompanyStatistic;

class CompanyStatisticService
{
    public $user_id;
    public $name;
    public $count;

    public function createCompanyStatistic()
    {
        return CompanyStatistic::create(
            [
                'user_id' => $this->user_id,
                'name'    => $this->name,
                'count'  => $this->count
            ]
        );
    }

    public function updateCompanyStatistic(CompanyStatistic $companyStatistic)
    {
        $companyStatistic->update(
            [
                'name'   => $this->name,
                'count' => $this->count
            ]
        );

        return $companyStatistic;
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

    public function setCount($count)
    {
        $this->count = $count;
        return $this;
    }


}
