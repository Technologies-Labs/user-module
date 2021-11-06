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
use phpDocumentor\Reflection\Types\This;

class UserOffer extends Component
{
    use WithFileUploads;
    public  $user;

    public  $image;
    public  $details;
    // public  $created_at;

    public  $user_id;
    public  $offer_id;
    public  $offer;
    public  $currentUser;
    public  $isCurrantUser;
    public  $userOffer;
    private $offerService;
    private $offerRepository;
    public  $modal;



    public function __construct()
    {
        $this->setCreateModal();
        $this->offerService    = new OfferService();
        $this->offerRepository = new OfferRepository();
        $this->currentUser     = Auth::user();
    }

    public function render()
    {
        $this->userOffer = $this->offerRepository->getAllUserOffer($this->user);
        return view('usermodule::livewire.offer.user-offer');
    }

    public function setCreateModal()
    {
        $this->modal = [
            'name'  => 'create',
            'title' => 'Add Offer',
            'route' => 'createUserOffer()'
        ];
        $this->image        = '';
        $this->details      = '';
    }

    public function setUpdateModal()
    {
        $this->modal = [
            'name'  => 'update',
            'title' => 'Edit Offer',
            'route' => 'updateUserOffer()'
        ];
    }

    protected $rules = [
        'details' => 'required',
        'image'   => 'required',
    ];

    public function createUserOffer()
    {
        $this->validate($this->rules);
        $this->offerService->setUserID($this->user->id)
            ->setImage($this->image)
            ->setDetails($this->details)
            ->setType(OfferEnum::USER);
        $offer = $this->offerService->createOffer();

        $this->userOffer->push($offer);
        $this->resetInputFields();
        $this->emit('modalClose', '.add-offer-popup');
        $this->emit('showMessage', ['icon' => 'success', 'text' => "Your Offer Created Successfully", 'title' => 'Offer Create']);
    }

    public function editUserOffer($id)
    {
        //dd($this->userOffer->find($id));
        $this->setUpdateModal();
        $this->offer    =  $this->userOffer->find($id);
        $this->offer_id = $id;
        $this->image    = $this->offer->image;
        $this->details  = $this->offer->details;
    }

    public function updateUserOffer()
    {
        if (!$this->offer_id) {
            session()->flash('message', 'not found offer');
            return;
        }
        $this->validate([
            'details' => 'required',
        ]);

        $offer = [
            'details' => $this->details
        ];

        if ($this->image && !is_string($this->image)) {
            $offer['image'] = $this->image->store('offers', 'public');
            // if ($offer['image']) {
            //     Storage::delete($this->offer->image);
            // }
        }

        $this->userOffer = $this->userOffer->find($this->offer_id)->update($offer);
        $this->emit('modalClose', '.add-offer-popup');
        $this->emit('showMessage', ['icon' => 'success', 'text' => "Your Offer Updated Successfully", 'title' => 'Offer Updated']);

        $this->resetInputFields();
    }

    public function deleteOffer($id)
    {
        $this->userOffer->find($id)->delete();
        $this->resetInputFields();
        $this->emit('showMessage', ['icon' => 'success', 'text' => "Your Offer Deleted Successfully", 'title' => 'Offer Delete']);
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->setCreateModal();
        $this->image        = '';
        $this->details      = '';
        $this->user_id      = '';
        $this->offer_id     = '';
        $this->offer        = '';
    }
}
