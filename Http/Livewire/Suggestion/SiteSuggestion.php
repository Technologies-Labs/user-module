<?php

namespace Modules\User\Http\Livewire\Suggestion;

use App\Traits\ModalHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\User\Entities\Suggestion;
use Modules\User\Services\SuggestionService;
use Modules\User\Enum\SuggestionEnum;


class SiteSuggestion extends Component
{
    use WithFileUploads , ModalHelper;

    public $details;
    public $file;
    public $template;

    public function render()
    {
        return view('user::livewire.suggestion.site-suggestion');
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
