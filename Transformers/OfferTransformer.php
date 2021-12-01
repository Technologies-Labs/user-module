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
    public function transform(Offer $offer)
    {
        return [
            'id'                => (int) $offer->id,
            'image'             => $offer->image,
            'details'           => $offer->details,
            'type'              => $offer->type,
            'position'          => $offer->position,
            'user_id'           => $offer->user_id,
            'start_date'        => $offer->start_date,
            'end_date'          => $offer->end_date,
        ];
    }
}
