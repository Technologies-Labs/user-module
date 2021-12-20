<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserSuggestionController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return view('user::website.suggestion.show-user-suggestion',compact('user'));
    }
}
