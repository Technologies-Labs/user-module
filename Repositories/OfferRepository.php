<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class OfferRepository
{
    public function getAllUserOffer(User $user)
    {
        return $user->offers()
                    ->select('id','image','details','created_at')
                    ->orderByDesc('created_at')->get();
    }
}
