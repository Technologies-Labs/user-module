<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use App\Actions\Notification\SendNotification;
use App\Traits\ModalHelper;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;
use Modules\NotificationModule\Enums\NotificationTemplateKeysEnums;
use Modules\UserModule\Notifications\SuggestionNotification;
use Modules\UserModule\Services\SuggestionService;
use Modules\UserModule\Enum\SuggestionEnum;

class UserSuggestion extends Component
{
    use WithFileUploads , ModalHelper;

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
        $this->resetFilters();
        $suggestionNotification = new SuggestionNotification();
        $suggestionNotification
        ->setTemplate(NotificationTemplateKeysEnums::CREATE_SUGGESTION)
        ->setUser($this->user)
        ->setSuggest(Auth::user())
        ->handle();

        $this->modalClose('.new-question-popup', 'success', "Your Suggestion Created Successfully", "Suggestion Create");
    }

    public function resetFilters()
    {
        $this->details = null;
        $this->file = null;
    }
}
