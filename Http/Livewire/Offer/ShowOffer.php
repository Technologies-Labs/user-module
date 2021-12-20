<?php

namespace Modules\User\Http\Livewire\Offer;

use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithPagination;
use Modules\User\Enum\OfferEnum;
use Modules\User\Repositories\OfferRepository;

class ShowOffer extends Component
{
    //public  $offers;
    private $offerRepository;
    public  $perPage = 20;

    public function loadMore()
    {
        $this->perPage += 20;
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
        return view('user::livewire.offer.show-offer', [
            'offers' => $this->offers
        ]);
    }
}
