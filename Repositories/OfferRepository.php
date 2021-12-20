<?php

namespace Modules\User\Repositories;

use App\Models\User;
use League\Fractal\Resource\Collection;
use Modules\User\Entities\Offer;
use Modules\User\Transformers\OfferTransformer;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class OfferRepository
{
    public function getAllOffersByType($type, $paginate = 10)
    {
        $offers = Offer::where('type', $type)->paginate($paginate,['*'],null);
        return new Collection($offers, new OfferTransformer());
    }


    public function getAllUserOffer(User $user,$paginate = 10)
    {
        $offers = $user->offers()->paginate($paginate,['*'],null);
        return new Collection($offers, new OfferTransformer());
    }
}
