<?php

namespace Modules\UserModule\Http\Livewire\Company;

use App\Traits\ModalHelper;
use Livewire\Component;
use Modules\UserModule\Services\CompanyStatisticService;

class CompanyStatistics extends Component
{
    use ModalHelper;
    private $companyStatisticService;

    public $user;
    public $isCurrantUser;

    public $modal;

    public $statisticName;
    public $statisticCount;
    public $statistic;

    public $statistics;

    public function mount()
    {
        $this->statistics = $this->user->companyStatistics;
    }

    public function __construct()
    {
        $this->setStatisticCreateModal();
        $this->companyStatisticService = new CompanyStatisticService();
    }

    public function setStatisticCreateModal()
    {
        $this->modal = [
            'name'  => 'Create',
            'title' => 'Create Statistic',
            'route' => 'createUserStatistic()'
        ];
        $this->emit('modalClose', ".servies-opearition-popup");
    }

    public function setStatisticUpdateModal()
    {
        $this->modal = [
            'name'  => 'Update',
            'title' => 'Edit Statistic',
            'route' => 'updateUserStatistic()'
        ];
        $this->emit('modalClose', ".servies-opearition-popup");
    }

    public function render()
    {
        return view('usermodule::livewire.company.company-statistics');
    }

    protected $statisticRules = [
        'statisticName'   => 'required',
        'statisticCount' => 'required|numeric'
    ];



    public function createUserStatistic()
    {
        $this->validate($this->statisticRules);
        $statistic = $this->companyStatisticService ->setUserID ($this->user->id)
                                       ->setName   ($this->statisticName)
                                       ->setCount ($this->statisticCount)
                                       ->createCompanyStatistic();
        $this->statistics = $this->statistics->push($statistic);

        $this->modalClose('.statistic-opearition-popup', 'success', "Your Statistic Created Successfully", "Statistic Create");

    }

    public function editUserStatistic($id)
    {
        $this->setStatisticUpdateModal();
        $statistic = $this->statistics->find($id);
        if (!$statistic) {
            abort(404);
        }
        $this->statistic = $statistic;
        $this->statisticName = $statistic->name;
        $this->statisticCount = $statistic->count;
    }

    public function updateUserStatistic()
    {
        $this->validate($this->statisticRules);

        $statistic = $this->companyStatisticService
                                       ->setName   ($this->statisticName)
                                       ->setCount ($this->statisticCount)
                                       ->updateCompanyStatistic($this->statistic);

        $edit = $this->statistic;

        $this->statistics  = $this->statistics->filter(function ($item) use ($edit) {
            return $item->id != $edit->id;
        });
        $this->statistics = $this->statistics->push($statistic);

        $this->modalClose('.statistic-opearition-popup', 'success', "Your Statistic Updated Successfully", "Statistic Updated");

    }

    public function deleteCompanyStatistic($id)
    {
        $statistic = $this->statistics->find($id);

        if (!$statistic ||  !$statistic->delete()) {
            abort(404);
        }
        $this->statistics  = $this->statistics->filter(function ($item) use ($statistic) {
            return $item->id != $statistic->id;
        });

        $this->modalClose('.statistic-opearition-popup', 'success', "Your Statistic Deleted Successfully", "Statistic Deleted");
    }


}
