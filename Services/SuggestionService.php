<?php

namespace Modules\User\Services;

use Livewire\WithFileUploads;
use Modules\User\Entities\Suggestion;

class SuggestionService
{
    use WithFileUploads;

    public $user_id;
    public $suggest_id;
    public $details;
    public $type;
    public $file;

    public function createSuggestion()
    {
        $suggestion = Suggestion::create(
            [
                'user_id'    => $this->user_id,
                'suggest_id' => $this->suggest_id,
                'details'    => $this->details,
                'type'       => $this->type,
                'file'       => $this->file
            ]);

        return response()->json([
            'success'       => ($suggestion) ? true : false,
            'message'       => ($suggestion) ? 'Suggestion created successfully' : 'Suggestion Failed created',
        ]);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setSuggestID($suggest_id)
    {
        $this->suggest_id = $suggest_id;
        return $this;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function setType($type)
    {
        $this->type = $type;
        return $this;
    }

    public function setFile($file)
    {
        if($file)
            $this->file = $file->store('suggestions','public');
        return $this;
    }
}
