<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use App\Traits\ModalHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Suggestion;
use Modules\UserModule\Services\SuggestionService;
use Modules\UserModule\Enum\SuggestionEnum;


class SiteSuggestion extends Component
{
    use WithFileUploads , ModalHelper;

    public $details;
    public $file;
    public $template;

    public function render()
    {
        return view('usermodule::livewire.suggestion.site-suggestion');
    }

    protected $rules = [
        'details' => 'required'
    ];

    public function addSiteSuggestion()
    {
        $this->validate($this->rules);
        $suggestion = new SuggestionService();
        $suggestion ->setUserID    (Auth::user()->id)
                    ->setDetails   ($this->details)
                    ->setType      (SuggestionEnum::SITE)
                    ->setFile      ($this->file)
                    ->createSuggestion();

        $this->modalClose('.add-site-suggestion-popup', 'success', "Your Suggestion Created Successfully", "Suggestion Create");

    }
}
