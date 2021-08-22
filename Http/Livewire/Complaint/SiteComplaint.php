<?php

namespace Modules\UserModule\Http\Livewire\Complaint;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Complaint;

class SiteComplaint extends Component
{
    use WithFileUploads;

    public $currantUser;
    public $details;
    public $file;

    function mount()
    {
        $this->currantUser = Auth::user();
    }

    public function render()
    {
        return view('usermodule::livewire.complaint.site-complaint');
    }

    protected $rules = [
        'details' => 'required',
        'file'    => 'required'
    ];

    public function addComplaint()
    {
        $this->validate($this->rules);
        $image = $this->file->store('complaints');
        Complaint::create([
            'user_id' => $this->currantUser->id,
            'details' => $this->details,
            'file'    => $image
        ]);
        $this->emit('resetFormInputs');
    }
}
