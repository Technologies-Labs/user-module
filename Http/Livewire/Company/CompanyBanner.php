<?php

namespace Modules\UserModule\Http\Livewire\Company;

use App\Traits\ModalHelper;
use Livewire\Component;
use Modules\UserModule\Entities\Company;
use Modules\UserModule\Repositories\CompanyRepository;

class CompanyBanner extends Component
{
    use ModalHelper;
    private $companyRepository;
    public $user;
    public $isCurrantUser;

    public $title;
    public $description;
    public $company;

    public $modal;

    public function __construct()
    {
        $this->setCompanyBannerUpdateModal();
        $this->companyRepository = new CompanyRepository();
    }


    public function mount()
    {
        $this->company = $this->companyRepository->getCompanyInfo($this->user);
        $this->title = $this->company->banner_title;
        $this->description = $this->company->banner_description;
    }
    public function render()
    {
        return view('usermodule::livewire.company.company-banner');
    }

    public function setCompanyBannerUpdateModal()
    {
        $this->modal = [
            'name'  => 'Update',
            'title' => 'Edit Company Banner',
            'route' => 'updateCompanyBanner()'
        ];
    }

    public function updateCompanyBanner()
    {
        $data =[
            'banner_title' => $this->title,
            'banner_description' => $this->description,
        ];
        $this->company->update($data);
        $this->modalClose('.company-banner-popup', 'success', "Your Banner Updated Successfully", "Banner  Updated");
    }
}
