<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;
use League\Fractal\Resource\Collection;
use Modules\UserModule\Entities\Offer;
use Modules\UserModule\Transformers\OfferTransformer;
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
        $offers = $user->offers()->paginate($paginate);

        $resource = new Collection($offers, new OfferTransformer());
        $resource->setPaginator(new IlluminatePaginatorAdapter($offers));
        //$offers = $user->offers()->paginate($paginate);

        return $resource;
    }
}
