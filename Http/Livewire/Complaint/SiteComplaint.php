<?php

namespace Modules\User\Http\Livewire\Complaint;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\User\Entities\Complaint;
use Modules\User\Services\ComplaintService;

class SiteComplaint extends Component
{
    use WithFileUploads;

    public $currantUser;
    public $details;
    public $file;
    protected $complaint;

    function __construct()
    {
        $this->currantUser = Auth::user();
        $this->complaint   = new ComplaintService();

    }

    public function render()
    {
        return view('user::livewire.complaint.site-complaint');
    }

    protected $rules = [
        'details' => 'required',
    ];

    public function addComplaint()
    {
        $this->complaint ->setUserID  ($this->currantUser->id)
                         ->setDetails ($this->details)
                         ->setFile    ($this->file);
        $this->complaint->createComplaint();

        $this->emit('resetFormInputs');
    }
}
