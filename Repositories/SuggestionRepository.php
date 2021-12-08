<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;

class SuggestionRepository
{
    public function getAllSuggestion(User $user , $paginate = 10){

        return $user->suggestions()->with('userSuggestion')->paginate($paginate,['*'],null);
    }
}

