<?php

namespace Modules\User\Services;

use App\Traits\ImageHelperTrait;
use App\Traits\UploadTrait;
use Modules\User\Entities\Offer;
use Modules\User\Enum\OfferEnum;

class OfferService
{
    use UploadTrait , ImageHelperTrait;

    public $image;
    public $details;
    public $type;
    public $user_id;

    public function createOffer()
    {
        return Offer::create(
            [
                'image'   => $this->image,
                'details' => $this->details,
                'type'    => $this->type,
                'user_id' => $this->user_id
            ]
        );

        // return response()->json([
        //     'data'          => $offer,
        //     'success'       => ($offer) ? true : false,
        //     'message'       => ($offer) ? 'Offer created successfully' : 'Offer Failed created',
        // ]);
    }

    public function updateOffer(Offer $offer)
    {
        $offer->update(
            [
                'image'   => $this->image,
                'details' => $this->details,
            ]
        );
        return $offer;
    }

    public function setImage($image)
    {
        if(is_string($image)){
            $this->image =  $image;
            return $this;
        }
        //$image->store('offers','public');
        $this->image = $this->uploadImageWithIntervention($image, 549, 329 ,OfferEnum::IMAGE)['name'];
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
