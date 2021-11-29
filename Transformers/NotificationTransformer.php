<?php

namespace Modules\UserModule\Transformers;

use Auth;
use Modules\UserModule\Enum\NotificationTypeEnum;
use Notification;

class NotificationTransformer
{
    //use WithPagination;

    public function transformAllNotifications($type)
    {
        $notifications = [];
        $user = Auth::user();

        if ($type == NotificationTypeEnum::FINANCIAL) {
            $notifications = Notification::where('type', NotificationTypeEnum::FINANCIAL)->where('is_read', 0)->paginate(10);
        } elseif ($type == NotificationTypeEnum::ADMIN) {
            $notifications = Notification::where('type', NotificationTypeEnum::ADMIN)->where('is_read', 0)->paginate(10);
        } else {
            $notifications = ($user) ? $user->notifications()->where('is_read', 0)->paginate(10) : [];
        }

        return [
            'notifications'  => $notifications,
        ];
    }
}
