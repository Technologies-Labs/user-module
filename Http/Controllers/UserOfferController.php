<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class UserOfferController extends Controller
{
    public function all()
     {
         return view('usermodule::website.offer.show-offer');
     }

    public function index()
    {
        $user = Auth::user();
        return view('usermodule::website.offer.user-offer',compact('user'));
    }
}
