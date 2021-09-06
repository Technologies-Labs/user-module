<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Livewire\Component;
use Modules\UserModule\Repositories\OfferRepository;

class ShowOffer extends Component
{
    public  $offers;
    private $offerRepository;

    public function mount()
    {
        $this->offerRepository =  new OfferRepository();
    }

    public function render()
    {
        $this->offers = $this->offerRepository->getAllOffer();
        return view('usermodule::livewire.offer.show-offer');
    }
}
