<?php

namespace Modules\UserModule\Repositories;

use Illuminate\Support\Facades\Auth;

class UserRepository {

/**
     * Get User Notifications
*/
    public function getUserNotifications($type) {

        if($type == "notifications") {
        return Auth::user()->notifications->where('is_financial' , 0)->sortBy('is_read');
        }
        else if($type == "financial") {
        return Auth::user()->notifications->where('is_financial' , 1)->sortBy('is_read');
        }
    }
}
