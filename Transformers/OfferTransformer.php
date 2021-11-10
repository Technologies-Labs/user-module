<?php

namespace Modules\UserModule\Transformers;

use Livewire\WithPagination;
use Modules\UserModule\Entities\Offer;

class OfferTransformer
{
    //use WithPagination;

    public function transformAllOffer()
    {
        return [
            'offers'  => Offer::where('type','admin')->where('active','1')->paginate(3),
        ];
    }
    public function transform(Offer $user)
    {
        return [
            'id'            => (int) $user->id,
            'name'          => (string) $user->name,
            'email'         => (string) $user->email,
            'address'       => (string) $user->address,
        ];
    }
}
