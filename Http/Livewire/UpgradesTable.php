<?php

namespace Modules\UserModule\Http\Livewire;

use Livewire\Component;
use Mediconesystems\LivewireDatatables\BooleanColumn;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Modules\UserModule\Entities\Upgrade;
use Modules\UserModule\Repositories\UpgradeRepository;

class UpgradesTable extends LivewireDatatable
{
    public $model = Upgrade::class;

    public function builder()
    {
        return (new UpgradeRepository())->getAllUpgrade();
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')
                ->label('ID'),

            Column::name('upgrade.name')
                ->label('User'),

            Column::name('current_package')
                ->label('Current Package'),

            Column::name('next_package')
                ->label('Next Package'),

            Column::name('status')
                ->label('Status')
                ->editable(),

            Column::name('message')
                ->label('Message')
                ->editable(),

            BooleanColumn::name('is_active')
                ->label('Activation')
                ->editable(),

            Column::delete('id')->label('Delete'),

        ];
    }
}
