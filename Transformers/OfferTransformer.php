<?php

namespace Modules\UserModule\Transformers;

use League\Fractal\TransformerAbstract;
use Livewire\WithPagination;
use Modules\UserModule\Entities\Offer;

class OfferTransformer  extends TransformerAbstract
{

    //use WithPagination;

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


    // public function transformAllOffer()
    // {
    //     return [
    //         'offers'  => Offer::where('type','admin')->where('active','1')->paginate(3),
    //     ];
    // }

}
