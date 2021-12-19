<?php

namespace Modules\UserModule\Http\Livewire\Offer;

use App\Traits\ImageHelperTrait;
use App\Traits\ModalHelper;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use Modules\NotificationModule\Enums\NotificationTemplateKeysEnums;
use Modules\UserModule\Entities\Offer;
use Modules\UserModule\Enum\OfferEnum;
use Modules\UserModule\Notifications\OfferNotification;
use Modules\UserModule\Repositories\OfferRepository;
use Modules\UserModule\Services\OfferService;
use phpDocumentor\Reflection\Types\This;

class UserOffer extends Component
{
    use WithFileUploads, ModalHelper;

    private $offerService;
    private $offerRepository;

    public  $user;

    public  $image;
    public  $details;
    // public  $created_at;

    public  $offer;
    public  $currentUser;
    public  $isCurrantUser;

    //public  $offers;
    public $readyToLoad = false;
    public  $modal;

    protected $listeners = ['loadOffers'];

    public  $perPage = 10;

    public function loadMore()
    {
        $this->perPage += 10;
    }

    public function getOffersProperty()
    {
        return ($this->readyToLoad) ? $this->offerRepository->getAllUserOffer($this->user, $this->perPage)->getData() : [];
    }

    public function loadOffers()
    {
        $this->readyToLoad = true;
    }

    public function boot()
    {
        $this->setCreateModal();
        $this->offerService    = new OfferService();
        $this->offerRepository = new OfferRepository();
        $this->currentUser     = Auth::user();
    }

    // public function __construct()
    // {
    //     $this->setCreateModal();
    //     $this->offerService    = new OfferService();
    //     $this->offerRepository = new OfferRepository();
    //     $this->currentUser     = Auth::user();
    // }

    public function render()
    {
        return view('usermodule::livewire.offer.user-offer', [
            'offers' =>  $this->offers,
        ]);
    }

    public function setCreateModal()
    {
        $this->modal = [
            'name'  => 'create',
            'title' => 'Add Offer',
            'route' => 'createUserOffer()'
        ];
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
        'image'   => 'required | image',
    ];

    public function createUserOffer()
    {
        $this->validate($this->rules);

        $offer = $this->offerService
            ->setUserID($this->user->id)
            ->setImage($this->image)
            ->setDetails($this->details)
            ->setType(OfferEnum::USER)
            ->createOffer();

        $notification = new OfferNotification();
        $notification
        ->setTemplate(NotificationTemplateKeysEnums::CREATE_OFFER)
        ->setUser($this->user)
        ->setOffer($offer)
        ->setCreateOfferMessage()
        ->handle();

        $this->resetInputFields();
        $this->modalClose('.add-offer-popup', 'success', 'Your Offer Created Successfully', 'Your Offer Created Successfully');
    }

    public function editUserOffer($id)
    {
        //dd($this->userOffer->find($id));
        $this->setUpdateModal();
        $this->offer    = $this->offers->find($id);
        $this->image    = $this->offer->image;
        $this->details  = $this->offer->details;
        $this->emit('showPopup','.add-offer-popup');
    }

    public function updateUserOffer()
    {
        $this->validate([
            'details' => 'required',
        ]);

        $offer = $this->offerService
        ->setImage($this->image)
        ->setDetails($this->details)
        ->updateOffer($this->offer);

        $this->resetInputFields();
        $this->modalClose('.add-offer-popup', 'success', 'Your Offer Updated Successfully', 'Your Offer Updated Successfully');
    }

    public function deleteOffer($id)
    {
        $offer = $this->offers->find($id);
        if (!$offer) {
            $this->modalClose('', 'error', 'error', 'error');
            return null;
        }
        $offer->delete();
        $this->emit('deleteItem', "#offer-post-" . $offer->id);
        $this->resetInputFields();
        $this->modalClose('', 'success', 'Your Offer Deleted Successfully', 'Offer Delete');
    }

    public function resetInputFields()
    {
        $this->setCreateModal();
        $this->image        = '';
        $this->details      = '';
        $this->offer        = null;
    }
}
