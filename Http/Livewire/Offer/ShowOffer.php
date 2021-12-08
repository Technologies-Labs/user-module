<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\UserModule\Enum\OfferEnum;
use Modules\UserModule\Repositories\OfferRepository;

class ShowOffer extends Component
{
    use WithPagination;
    //public  $offers;
    private $offerRepository;
    protected $paginationTheme = 'bootstrap';

    public  $perPage = 4;

    public function loadMore()
    {
        $this->perPage += 1;
    }

    public function boot()
    {
        $this->offerRepository =  new OfferRepository();
    }

    public function getOffersProperty()
    {
        return $this->offerRepository->getAllOffersByType(OfferEnum::ADMIN , $this->perPage)->getData();
    }

    public function render()
    {

        return view('usermodule::livewire.offer.show-offer',[
            'offers' => $this->offers
        ]);
    }
}
