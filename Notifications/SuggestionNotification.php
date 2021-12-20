<?php

namespace Modules\User\Notifications;

use App\Actions\Notification\SendBellNotificationAction;
use Modules\Notification\Entities\Notification;
use Modules\Notification\Enums\NotificationTypeEnum;
use Modules\Notification\Notifications\NotificationAbstract;
use Modules\Notification\Traits\NotificationTrait;

class SuggestionNotification extends NotificationAbstract
{
    use NotificationTrait;
    public $user;
    public $suggest;
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setSuggest($user)
    {
        $this->suggest = $user;
        return $this;
    }

    public function handle()
    {
        $search     = array('user_full_name');
        $replace    = array($this->suggest->full_name);
        $message    = str_replace($search, $replace, $this->template->content);

        $this->createNotification($this->user ,NotificationTypeEnum::USER ,$message);
    }
}
