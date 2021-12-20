<?php

namespace Modules\User\Http\Livewire\Company;

use App\Traits\ModalHelper;
use Livewire\Component;
use Modules\User\Services\CompanyServiceService;
use Modules\User\Traits\CompanyServicesModalsTrait;

class CompanyServices extends Component
{
    use ModalHelper ;
    private $companyServices;

    public $user;
    public $isCurrantUser;

    public $services;
    public $serviceName;
    public $serviceDescription;
    public $service;

    public $modal;

    protected $serviceRules = [
        'serviceName'           => 'required',
        'serviceDescription'    => 'required',
    ];

    public function setServiceCreateModal()
    {
        $this->modal = [
            'name'  => 'Create',
            'title' => 'Create Service',
            'route' => 'createUserService()'
        ];
    }

    public function setServiceUpdateModal()
    {
        $this->modal = [
            'name'  => 'Update',
            'title' => 'Edit Service',
            'route' => 'updateUserService()'
        ];
    }

    public function __construct()
    {
        $this->setServiceCreateModal();
        $this->companyServices = new CompanyServiceService();
    }

    public function mount()
    {
        //$this->setServiceCreateModal();
        $this->services = $this->user->companyServices;
        $this->statistics = $this->user->companyStatistics;
    }


    public function render()
    {
        return view('user::livewire.company.company-services');
    }


    public function createUserService()
    {
        $this->validate($this->serviceRules);
        $service = $this->companyServices->setUserId($this->user->id)
            ->setName($this->serviceName)
            ->setDescription($this->serviceDescription)
            ->createCompanyService();
        $this->services = $this->services->push($service);

        $this->modalClose('.servies-opearition-popup', 'success', "Your Service Created Successfully", "Service Create");
    }

    public function editUserService($id)
    {
        $this->setServiceUpdateModal();
        $service = $this->services->find($id);
        if (!$service) {
            abort(404);
        }
        $this->service = $service;
        $this->serviceName = $service->name;
        $this->serviceDescription = $service->description;
    }

    public function updateUserService()
    {
        $this->validate($this->serviceRules);
        $service = $this->companyServices->setName($this->serviceName)
                                    ->setDescription($this->serviceDescription)
                                    ->updateCompanyService($this->service);
        $editService = $this->service;

        $this->services  = $this->services->filter(function ($item) use ($editService) {
            return $item->id != $editService->id;
        });
        $this->services = $this->services->push($service);

        $this->modalClose('.servies-opearition-popup', 'success', "Your Service Updated Successfully", "Service Updated");
    }

    public function deleteService($id)
    {
        $service = $this->services->find($id);
        if (!$service ||  !$service->delete()) {
            abort(404);
        }
        $this->services  = $this->services->filter(function ($item) use ($service) {
            return $item->id != $service->id;
        });

        $this->modalClose('.servies-opearition-popup', 'success', "Your Service Deleted Successfully", "Service Deleted");
    }

}
