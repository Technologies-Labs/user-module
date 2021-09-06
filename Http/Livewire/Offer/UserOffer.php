<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Offer;
use Modules\UserModule\Enum\OfferEnum;
use Modules\UserModule\Repositories\OfferRepository;
use Modules\UserModule\Services\OfferService;

class UserOffer extends Component
{
    use WithFileUploads;

    public  $image;
    public  $details;
    public  $created_at;
    public  $user_id;
    public  $offer_id;
    public  $offer;
    public  $currentUser;
    public  $userOffer;
    private $offerService;
    private $offerRepository;

    public function __construct()
    {
        $this->offerService    = new OfferService();
        $this->offerRepository = new OfferRepository();
        $this->currentUser     = Auth::user();
    }

    public function render()
    {
        $this->userOffer = $this->offerRepository->getAllUserOffer($this->currentUser);
        return view('usermodule::livewire.offer.user-offer');
    }

    protected $rules = [
        'details' => 'required',
        'image'   => 'required',
    ];

    public function createUserOffer()
    {
        $this->validate($this->rules);
        $this->offerService ->setUserID  ($this->currentUser->id)
                            ->setImage   ($this->image)
                            ->setDetails ($this->details)
                            ->setType    (OfferEnum::USER);
        $this->offerService ->createOffer();
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function editUserOffer($id)
    {
        $this->offer    = Offer::where('id',$id)->first();
        $this->offer_id = $id;
        $this->image    = $this->offer->image;
        $this->details  = $this->offer->details;
    }

    public function updateUserOffer()
    {
        if (!$this->offer_id)
        {
            session()->flash('message', 'not found offer');
            return;
        }
        $this->validate($this->rules);
        $offer =[
            'details' => $this->details
        ];

        if ($this->image) {
            $offer['image'] = $this->image->store('offers','public');
            if ($offer['image']) {
                Storage::delete($this->offer->image);
            }
        }

        $this->userOffer = Offer::find($this->offer_id)->update($offer);
        $this->emit('modalClose');
        $this->resetInputFields();
        session()->flash('message', 'your offer updated successfully');
    }

    public function deleteOffer($id)
    {
        $this->userOffer->find($id)->delete();
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->image      = '';
        $this->details    = '';
        $this->user_id    = '';
        $this->offer_id   = '';
        $this->offer      = '';
    }
}
