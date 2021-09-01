<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Routing\Controller;

class UserOfferController extends Controller
{
   public function show()
   {
       return view('usermodule::website.offer.show-offer');
   }
}
