<?php

namespace Modules\UserModule\Http\Livewire\Company;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\UserModule\Repositories\CompanyRepository;
use Modules\UserModule\Services\CompanyStatisticService;
use Modules\UserModule\Entities\CompanyStatistic;

class UserCompanyStatistic extends Component
{
    public  $name;
    public  $number;
    public  $userCompanyStatistic;
    public  $companyStatisticID;
    private $companyRepository;
    private $companyStatisticService;

    public function __construct()
    {
        $this->companyRepository       = new CompanyRepository();
        $this->companyStatisticService = new CompanyStatisticService();
    }

    public function render()
    {
        $this->userCompanyStatistic = $this->companyRepository->getAllCompanyStatistic(Auth::user());
        return view('usermodule::livewire.company.user-company-statistic');
    }

    protected $rules = [
        'name'   => 'required',
        'number' => 'required|numeric'
    ];

    public function createCompanyStatistic()
    {
        $this->validate($this->rules);
        $this->companyStatisticService ->setUserID (Auth::user()->id)
                                       ->setName   ($this->name)
                                       ->setNumber ($this->number);
        $this->userCompanyStatistic = $this->companyStatisticService ->createCompanyStatistic();
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function updateCompanyStatistic($id)
    {
        $companyStatistic         = CompanyStatistic::where('id',$id)->first();
        $this->companyStatisticID = $id;
        $this->name               = $companyStatistic->name;
        $this->number             = $companyStatistic->number;
    }

    public function update()
    {
        if ($this->companyStatisticID)
        {
            $this->validate($this->rules);
            $statistic = CompanyStatistic::where('id',$this->companyStatisticID)->first();
            $this->companyStatisticService ->setName   ($this->name)
                                           ->setNumber ($this->number);
            $this->userCompanyStatistic = $this->companyStatisticService->updateCompanyStatistic($statistic);
            $this->resetInputFields();
            $this->emit('modalClose');
        }
    }

    public function deleteCompanyStatistic($id)
    {
        $this->userCompanyStatistic->find($id)->delete();
        $this->resetInputFields();
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->companyStatisticID = '';
        $this->name               = '';
        $this->number             = '';
    }
}
