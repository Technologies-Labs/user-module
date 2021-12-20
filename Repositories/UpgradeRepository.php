<?php


namespace Modules\User\Repositories;


use Modules\User\Entities\Upgrade;
use Spatie\QueryBuilder\QueryBuilder;

class UpgradeRepository
{
    public function getAllUpgrade()
    {
        return QueryBuilder::for(Upgrade::class)
            ->allowedIncludes(['upgrade'])
            ->with('upgrade:id,name');
    }
}
