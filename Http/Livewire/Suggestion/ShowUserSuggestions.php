<?php

namespace Modules\User\Http\Livewire\Suggestion;

use Livewire\Component;
use Modules\User\Entities\Suggestion;
use Modules\User\Repositories\SuggestionRepository;
use Storage;

class ShowUserSuggestions extends Component
{
    public  $user;
    private $suggestionRepository;
    //public  $suggestions;

    // public $readyToLoad = false;

    // protected $listeners = ['loadSuggestions'];

    public  $perPage = 20;

    public function getSuggestionsProperty()
    {
        return $this->suggestionRepository->getAllSuggestion($this->user , $this->perPage);
    }


    // public function loadSuggestions()
    // {
    //     $this->readyToLoad = true ;
    // }

    public function loadMore()
    {
        $this->perPage += 10;
    }

    function boot()
    {
        $this->suggestionRepository = new SuggestionRepository();
    }

    // function __construct()
    // {
    //     $this->suggestionRepository = new SuggestionRepository();
    // }

    public function render()
    {


        return view('user::livewire.suggestion.show-user-suggestions',[
            'suggestions' =>$this->suggestions
        ]);
    }

    public function deleteSuggestion($id)
    {
        $this->suggestions->find($id)->delete();
        session()->flash('message', 'suggestion deleted successfully');
    }

    public function downloadsDoc(Suggestion $suggestion)
    {
        return Storage::disk('public')->download($suggestion->file);

    }
}
