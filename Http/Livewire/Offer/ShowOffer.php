<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\UserModule\Repositories\OfferRepository;

class ShowOffer extends Component
{
    use WithPagination;
    public  $offers;
    private $offerRepository;
    protected $paginationTheme = 'bootstrap';

    public function __construct()
    {
        $this->offerRepository =  new OfferRepository();
    }

    public function render()
    {
        $this->offers = $this->offerRepository->getAllOffer();
        return view('usermodule::livewire.offer.show-offer');
    }
}
