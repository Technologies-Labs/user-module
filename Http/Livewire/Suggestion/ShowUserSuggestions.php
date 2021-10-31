<?php

namespace Modules\UserModule\Http\Livewire\Suggestion;

use Livewire\Component;
use Modules\UserModule\Repositories\SuggestionRepository;

class ShowUserSuggestions extends Component
{
    public  $user;
    private $suggestionRepository;
    public  $suggestions;

    function __construct()
    {
        $this->suggestionRepository = new SuggestionRepository();
    }

    public function render()
    {
        $this->suggestions = $this->suggestionRepository->getAllSuggestion($this->user);
        return view('usermodule::livewire.suggestion.show-user-suggestions');
    }

    public function deleteSuggestion($id)
    {
        $this->suggestions->find($id)->delete();
        session()->flash('message', 'suggestion deleted successfully');
    }
}
