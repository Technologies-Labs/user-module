<?php

namespace Modules\UserModule\Http\Livewire\Company;

use App\Traits\ModalHelper;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Services\CompanyCustomerSayService;
use Modules\UserModule\Services\CompanyServiceService;
use Modules\UserModule\Services\CompanyStatisticService;
use Modules\UserModule\Traits\CompanyServicesModalsTrait;

class CompanyCustomerSay extends Component
{
    use ModalHelper , WithFileUploads;
    private $companyCustomerSayService;

    public $user;
    public $isCurrantUser;

    public $modal;

    public $name;
    public $say;
    public $image;
    public $customerSay;

    public $customerSays;

    public function mount()
    {
        $this->customerSays = $this->user->companyCustomerSays;
    }

    public function __construct()
    {
        $this->setCustomerSayCreateModal();
        $this->companyCustomerSayService = new CompanyCustomerSayService();
    }

    public function setCustomerSayCreateModal()
    {
        $this->modal = [
            'name'  => 'Create',
            'title' => 'Create Customer Say',
            'route' => 'createUserCustomerSay()'
        ];
    }

    public function setCustomerSayUpdateModal()
    {
        $this->modal = [
            'name'  => 'Update',
            'title' => 'Edit Customer Say',
            'route' => 'updateUserCustomerSay()'
        ];
    }

    public function render()
    {
        return view('usermodule::livewire.company.company-customer-say');
    }

    protected $rules = [
        'name'   => 'required',
        'say' => 'required',
        'image' => 'required | image',
    ];



    public function createUserCustomerSay()
    {
        $this->validate($this->rules);
        $say = $this->companyCustomerSayService->setUserID ($this->user->id)
                                       ->setCustomerName ($this->name)
                                       ->setCustomerSay ($this->say)
                                       ->setCustomerImage ($this->image)
                                       ->createCompanyCustomerSay();

        $this->customerSays = $this->customerSays->push($say);

        $this->modalClose('.customer-say-opearition-popup', 'success', "Your Customer Created Successfully", "Customer Create");

    }

    public function editUserCustomerSay($id)
    {
        $this->setCustomerSayUpdateModal();
        $customerSay = $this->customerSays->find($id);

        if (!$customerSay) {
            abort(404);
        }
        $this->customerSay = $customerSay;
        $this->name = $customerSay->customer_name;
        $this->say = $customerSay->customer_say;
        $this->image = $customerSay->customer_image;
    }

    public function updateUserCustomerSay()
    {
        $this->validate([
            'name' => 'required',
            'say' => 'required',
        ]);
        // $this->validate($this->rules);
        $customerSay = $this->companyCustomerSayService
                                       ->setCustomerName ($this->name)
                                       ->setCustomerSay ($this->say)
                                       ->updateCustomerImg ($this->image)
                                       ->updateCompanyCustomerSay($this->customerSay);

        $edit = $this->customerSay;

        $this->customerSays  = $this->customerSays->filter(function ($item) use ($edit) {
            return $item->id != $edit->id;
        });
        $this->customerSays = $this->customerSays->push($customerSay);

        $this->modalClose('.customer-say-opearition-popup', 'success', "Your Customer Say Updated Successfully", "Customer Say  Updated");

    }

    public function deleteCustomerSay($id)
    {
        $say = $this->customerSays->find($id);

        if (!$say ||  !$say->delete()) {
            abort(404);
        }
        $this->customerSays  = $this->customerSays->filter(function ($item) use ($say) {
            return $item->id != $say->id;
        });

        $this->modalClose('.customer-say-opearition-popup', 'success', "Your Customer Say Deleted Successfully", "Customer Say Deleted");
    }

}
