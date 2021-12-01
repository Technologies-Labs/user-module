<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;
use League\Fractal\Resource\Collection;
use Modules\UserModule\Entities\Offer;
use Modules\UserModule\Transformers\OfferTransformer;

class OfferRepository
{
    public function getAllOffersByType($type, $paginate = 10)
    {
        $offers = Offer::where('type', $type)->where('active', 1)->paginate($paginate);
        return new Collection($offers, new OfferTransformer());
    }

    public function getAllOffer()
    {
        return (new OfferTransformer())->transformAllOffer();
    }

    public function getAllUserOffer(User $user)
    {
        return $user->offers()
            ->select('id', 'image', 'details', 'created_at')
            ->orderByDesc('created_at')->get();
    }
}
