<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Services\SuggestionService;
use Modules\UserModule\Enum\SuggestionEnum;

class UserSuggestion extends Component
{
    use WithFileUploads;

    public $user;
    public $details;
    public $file;

    public function render()
    {
        return view('usermodule::livewire.suggestion.user-suggestion');
    }

    protected $rules = [
        'details' => 'required',
    ];

    public function addSuggestion()
    {
        $this->validate($this->rules);
        $suggestion = new SuggestionService();
        $suggestion ->setUserID    (Auth::user()->id)
                    ->setSuggestID ($this->user->id)
                    ->setDetails   ($this->details)
                    ->setType      (SuggestionEnum::USER)
                    ->setFile      ($this->file);
        $suggestion->createSuggestion();
       $this->emit('resetFormInputs');
    }
}
