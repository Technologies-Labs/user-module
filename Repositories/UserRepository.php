<?php

namespace Modules\UserModule\Repositories;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Entities\SocialMediaAccount;
use Modules\UserModule\Enum\NotificationTypeEnum;
use Modules\UserModule\Transformers\NotificationTransformer;
use Notification;

class UserRepository
{

    /**
     * Get User Notifications
     */
    public function getUserNotifications($type)
    {
        return (new NotificationTransformer())->transformAllNotifications($type);
    }

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
