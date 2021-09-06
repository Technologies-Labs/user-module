<?php

namespace Modules\UserModule\Http\Livewire\Announcement;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Services\AnnouncementService;

class UserAnnouncement extends Component
{
    use WithFileUploads;

    public  $user;
    public  $details;
    public  $file;
    private $announcementService;

    public function __construct()
    {
        $this->announcementService = new AnnouncementService();
    }

    public function render()
    {
        return view('usermodule::livewire.announcement.user-announcement');
    }

    protected $rules = [
        'details' => 'required',
        'file'    => 'required'
    ];

    public function addAnnouncement()
    {
        $this->validate($this->rules);
        $this->announcementService->setUserID     (Auth::user()->id)
                                   ->setOpponentID($this->user->id)
                                   ->setDetails   ($this->details)
                                   ->setFile      ($this->file);
        $this->announcementService ->createAnnouncement();
        $this->resetInputFields();
        $this->emit('modalClose');
    }

    public function cancel()
    {
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->details = '';
        $this->file    = '';
    }
}
