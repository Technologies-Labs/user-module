<?php

namespace Modules\UserModule\Repositories;

use Modules\UserModule\Entities\Offer;

class OfferRepository
{
    public function getAllOffer()
    {
        $offer = new Offer();

        return $offer ->select ('image','details','active','type','start_date','end_date','user_id')
                      ->with   ('user') ->get();
    }
}
