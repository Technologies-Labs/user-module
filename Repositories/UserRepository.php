<?php

namespace Modules\User\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\User\Entities\SocialMediaAccount;
use Modules\User\Enum\NotificationTypeEnum;
use Modules\User\Transformers\NotificationTransformer;
use Notification;

class UserRepository
{

    /**
     * Get User Notifications
     */
    // public function getUserNotifications($type)
    // {
    //     return (new NotificationTransformer())->transformAllNotifications($type);
    // }

    /**
     * Get User socialMediaAccounts
     */
    public function getUserSocialMediaAccounts(User $user)
    {
        if( $user->socialMediaAccounts == null ){
            return SocialMediaAccount::create(['user_id' => $user->id]);
        }
        return $user->socialMediaAccounts;
    }
}
