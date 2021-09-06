<?php

namespace Modules\UserModule\Services;

use App\Traits\UploadTrait;
use Modules\UserModule\Entities\Offer;

class OfferService
{
    use UploadTrait;

    public $image;
    public $details;
    public $type;
    public $user_id;

    public function createOffer()
    {
        $offer = Offer::create(
            [
                'image'   => $this->image,
                'details' => $this->details,
                'type'    => $this->type,
                'user_id' => $this->user_id
            ]
        );

        return response()->json([
            'success'       => ($offer) ? true : false,
            'message'       => ($offer) ? 'Offer created successfully' : 'Offer Failed created',
        ]);
    }

    public function updateOffer(Offer $offer)
    {
        $offer->update(
            [
                'image'   => $this->image,
                'details' => $this->details,
            ]
        );
        return Offer::find($offer->id);
    }

    public function setImage($image)
    {
        $this->image = $image->store('offers','public');
        return $this;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }
}
