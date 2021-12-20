<?php

namespace Modules\User\Http\Livewire\NotificationsTemplates;

use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;
use Modules\User\Entities\NotificationsTemplate;

class NotificationsTemplateDataTable extends LivewireDatatable
{
    public $model = NotificationsTemplate::class;

    function columns()
    {
    	return [
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('action')->label('Action'),
            Column::name('tags')->label('Tags')->editable(),
            Column::name('content')->label('Content')->editable(),
    		DateColumn::name('created_at')->label('Creation Date'),
    	];
    }
}
