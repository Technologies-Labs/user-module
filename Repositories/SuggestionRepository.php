<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class SuggestionRepository
{
    public function getAllSuggestion(User $user){

        $suggestions = $user->suggestions()->with('userSuggestion')->get();
        return $suggestions;
    }
}

