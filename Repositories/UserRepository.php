<?php

namespace Modules\UserModule\Repositories;

use Illuminate\Support\Facades\Auth;

class UserRepository {

/**
     * Get User Notifications
*/
    public function getUserNotifications($type) {

        if($type == "notifications") {
        return Auth::user()->notifications->where('is_financial' , 0)->where('is_read' , 0)->sortByDesc('updated_at')->take(5);
        }
        else if($type == "financial") {
        return Auth::user()->notifications->where('is_financial' , 1)->where('is_read' , 0)->sortByDesc('updated_at')->take(5);
        }
    }
}
