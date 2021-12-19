<?php

namespace Modules\UserModule\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;

class OfferScope implements Scope
{
    public function apply(Builder $builder, Model $model)
    {
        $builder->where('active','1')->orderBy('id','DESC');
    }
}
