<?php

namespace Modules\UserModule\Repositories;
use App\Models\User;
use Modules\UserModule\Transformers\OfferTransformer;

class OfferRepository
{
    public function getAllOffer()
    {
        return (new OfferTransformer())->transformAllOffer();
    }

    public function getAllUserOffer(User $user)
    {
        return $user->offers()
                    ->select('id','image','details','created_at')
                    ->orderByDesc('created_at')->get();
    }

    public function getAllOfferByPosition($position)
    {
        return (new OfferTransformer())->transformAllOffersByPosition($position);
    }

}
