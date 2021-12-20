<?php

namespace Modules\User\Http\Livewire\NotificationsTemplates;

use Livewire\Component;
use Modules\User\Entities\NotificationsTemplate;

class Create extends Component
{
    public $action;
    public $content;
    public $tags;

    public function render()
    {
        return view('user::livewire.notifications-templates.create');
    }

    protected $rules=[
        'action'      => 'required|string',
        'content'     => 'required|string',
        'tags'        => 'required|string',
    ];

    public function create()
    {
        $this->validate($this->rules);

        NotificationsTemplate::create([
            'action'      => $this->action,
            'content'     => $this->content,
            'tags'        => $this->tags,
        ]);
        $this->reset();
    }


}
