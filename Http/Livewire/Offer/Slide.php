<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\UserModule\Enum\OfferPositionEnum;
use Modules\UserModule\Repositories\OfferRepository;

class Slide extends Component
{
    use WithPagination;

    private $offerRepository;
    public  $offers;

    public function __construct()
    {
        $this->offerRepository =  new OfferRepository();
    }

    public function render()
    {
        $this->offers = $this->offerRepository->getAllOfferByPosition(OfferPositionEnum::HOME);
        return view('usermodule::livewire.offer.slide');
    }
}
