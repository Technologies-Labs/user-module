<?php

namespace Modules\User\Transformers;

use League\Fractal\TransformerAbstract;
use Livewire\WithPagination;
use Modules\User\Entities\Offer;

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

}
