<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Suggestion;

class SiteSuggestion extends Component
{
    use WithFileUploads;

    public $details;
    public $currantUser;
    public $file;

    function mount()
    {
        $this->currantUser = Auth::user();
    }

    public function render()
    {
        return view('usermodule::livewire.suggestion.site-suggestion');
    }

    protected $rules = [
        'details' => 'required',
        'file'    => 'required'
    ];

    public function addSiteSuggestion()
    {
        $this->validate($this->rules);
        $image = $this->file->store('suggestions');
        Suggestion::create([
            'user_id'   => $this->currantUser->id,
            'details'   => $this->details,
            'type'      => 1,
            'file'      => $image
        ]);
        $this->emit('resetFormInputs');
    }
}
