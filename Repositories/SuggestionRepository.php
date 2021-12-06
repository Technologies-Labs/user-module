<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class SuggestionRepository
{
    public function getAllSuggestion(User $user){

        return $user->suggestions()->with('userSuggestion')->get();
    }
}

