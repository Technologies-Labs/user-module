<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Suggestion;

class UserSuggestion extends Component
{
    use WithFileUploads;

    public $user;
    public $currantUser;
    public $suggest_id;
    public $details;
    public $file;

    function mount()
    {
        $this->currantUser = Auth::user();
        $this->suggest_id  = $this->user->id;
    }

    public function render()
    {
        return view('usermodule::livewire.suggestion.user-suggestion');
    }

    protected $rules = [
        'details' => 'required',
        'file'    => 'required'
    ];

    public function addSuggestion()
    {
        $this->validate($this->rules);
        $image = $this->file->store('suggestions');
        Suggestion::create([
            'user_id'   => $this->currantUser->id,
            'suggest_id'=> $this->suggest_id,
            'details'   => $this->details,
            'type'      => 0,
            'file'      => $image
        ]);
        $this->emit('resetFormInputs');
    }
}
