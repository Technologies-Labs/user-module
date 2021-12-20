<?php

namespace Modules\User\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserOfferController extends Controller
{
    public function all()
     {
         return view('user::website.offer.show-offer');
     }

    public function index()
    {
        $user = Auth::user();
        return view('user::website.offer.user-offer',compact('user'));
    }
}
