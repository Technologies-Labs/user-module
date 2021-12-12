<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\UserModule\Enum\OfferEnum;
use Modules\UserModule\Repositories\OfferRepository;

class ShowOffer extends Component
{
    //public  $offers;
    private $offerRepository;
    public  $perPage = 10;

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function boot()
    {
        $this->offerRepository =  new OfferRepository();
    }

    public function getOffersProperty()
    {
        return $this->offerRepository->getAllOffersByType(OfferEnum::ADMIN, $this->perPage)->getData();
    }

    public function render()
    {
        //dd($this->offers);
        // $diffHours = Carbon::parse($this->offers->first()->end_date)->diffInHours(Carbon::now());
        // dd($diffHours);
        return view('usermodule::livewire.offer.show-offer', [
            'offers' => $this->offers
        ]);
    }
}
