<?php

namespace Modules\User\Http\Livewire\Company;

use App\Traits\ModalHelper;
use Illuminate\Http\Request;
use Livewire\Component;
use Modules\User\Entities\CompanyAddress;
use Modules\User\Repositories\UserAddressRepository;
use Modules\User\Repositories\UserContactUsRepository;
use Modules\User\Repositories\UserRepository;
use Modules\User\Services\CompanyAddressService;

class UserContactUs extends Component
{
    use ModalHelper;
    private $userContactUsRepository;
    private $userAddressRepository;
    private $userRepository;
    private $companyAddressService;

    public $user;
    public $isCurrantUser;

    public $contact;
    // public $addresses;
    public $socialMediaAccounts;

    public $address;
    public $phones;

    public $addressModal;

    public $website;
    public $email;
    public $phone;

    public $facebook;
    public $twitter;
    public $instegram;
    public $whatsApp;
    public $modal;

    public $readyToLoad = false;

    protected $listeners = ['loadUserContactUs'];

    public function getAddressesProperty()
    {
        return ($this->readyToLoad) ? $this->userAddressRepository->getUserAddresses($this->user) : [];
    }

    public function loadUserContactUs()
    {
        $this->readyToLoad = true ;
    }

    public function __construct()
    {
        $this->resetInputFields();
        $this->userContactUsRepository      = new UserContactUsRepository();
        $this->userAddressRepository        = new UserAddressRepository();
        $this->userRepository               = new UserRepository();
        $this->companyAddressService        = new CompanyAddressService();
    }

    public function mount()
    {
        $this->contact                      = $this->userContactUsRepository->getUserContactUs($this->user);

        $this->website = $this->contact->website;
        $this->email = $this->contact->email;
        $this->phone = $this->contact->phone;

        $this->socialMediaAccounts          = $this->userRepository->getUserSocialMediaAccounts($this->user);
        $this->facebook = $this->socialMediaAccounts->facebook;
        $this->twitter = $this->socialMediaAccounts->twitter;
        $this->instegram = $this->socialMediaAccounts->instegram;
        $this->whatsApp = $this->socialMediaAccounts->whatsApp;
    }

    public function render()
    {

        $socialMediaAccounts          = $this->userRepository->getUserSocialMediaAccounts($this->user);

        return view('user::livewire.company.user-contact-us',[
            'addresses'             => $this->addresses,
        ]);
    }

    protected $rules = [
        'address' => 'required',
        'phones'    => 'required',
    ];

    public function setCreateModal()
    {
        $this->modal = [
            'name'  => 'Create',
            'title' => 'Create Address',
            'route' => 'createUserAddress()'
        ];
    }
    public function setUpdateModal()
    {
        $this->modal = [
            'name'  => 'Update',
            'title' => 'Edit Address',
            'route' => 'updateUserAddress()'
        ];
    }

    /**
     * Start Address
     */
    public function createUserAddress()
    {
        $this->validate($this->rules);

        $address = $this->companyAddressService
            ->setUserID($this->user->id)
            ->setAddress($this->address)
            ->setPhones($this->phones)
            ->createCompanyAddress();

        //$this->addresses = $this->addresses->push($address);
        $this->resetInputFields();
        $this->modalClose('.address-op-popup','success','Your Address Created Successfully','Address Create');

    }
    public function editUserAddress($id)
    {
        $this->setUpdateModal();
        $address = $this->addresses->find($id);
        if (!$address) {
            abort(404);
        }
        $this->addressModal = $address;
        $this->address = $address->address;
        $this->phones = $address->phones;
        $this->emit('showPopup','.address-op-popup');

    }
    public function updateUserAddress()
    {
        if (!$this->addressModal) {
            abort(404);
            return;
        }
        $this->validate($this->rules);
        $this->companyAddressService = new CompanyAddressService();
        $address = $this->companyAddressService
            ->setAddress($this->address)
            ->setPhones($this->phones)
            ->updateCompanyAddress($this->addressModal);

        $this->resetInputFields();
        $this->modalClose('.address-op-popup','success','Your Address Updated Successfully','Address Updated');

    }
    public function deleteUserAddress($id)
    {
        $address = $this->addresses->find($id);
        if (!$address) {
            abort(404);
        }
        // $this->addresses  = $this->addresses->filter(function($item) use ($address){
        //     return $item->id != $address->id;
        // });
        $this->emit('deleteItem', "#address-" . $address->id);
        $address->delete();
        $this->modalClose('.address-op-popup','success','Your Address Deleted Successfully','Address Delete');
        //$this->resetInputFields();

    }
    /**
     * End Address
     */

    public function updateContactUs()
    {
        $date = [
            'website' =>  $this->website,
            'email' =>  $this->email,
            'phone' =>  $this->phone,
        ];
        $this->contact->update($date);
        $this->emit('modalClose', '.edit-contact-us-popup');
        $this->emit('showMessage', ['icon' => 'success', 'text' => "Your Information Updated Successfully", 'title' => 'Information Update']);
    }

    public function updateSocialMedia()
    {
        $date = [
            'facebook' =>  $this->facebook,
            'twitter' =>  $this->twitter,
            'instegram' =>  $this->instegram,
            'whatsApp' =>  $this->whatsApp,
        ];
        $this->socialMediaAccounts->update($date);
        $this->emit('modalClose', '.edit-social-media-popup');
        $this->emit('showMessage', ['icon' => 'success', 'text' => "Your Information Updated Successfully", 'title' => 'Information Update']);
    }

    public function resetInputFields()
    {
        $this->setCreateModal();
        $this->address     = '';
        $this->phones      = '';
    }


}
