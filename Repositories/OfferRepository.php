<?php

namespace Modules\UserModule\Repositories;
use App\Models\User;
use Modules\UserModule\Entities\Offer;

class OfferRepository
{
  public function getAllOffer()
   {
        $offer = new Offer();
        return $offer ->select ('image','details','active','type','start_date','end_date','user_id')
                      ->with   ('user') ->get();
   }
    public function getAllUserOffer(User $user)
    {
        return $user->offers()
                    ->select('id','image','details','created_at')
                    ->orderByDesc('created_at')->get();
    }
}
