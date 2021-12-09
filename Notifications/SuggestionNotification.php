<?php

namespace Modules\UserModule\Notifications;

use App\Actions\Notification\SendBellNotificationAction;
use Modules\NotificationModule\Entities\Notification;
use Modules\NotificationModule\Enums\NotificationTypeEnum;
use Modules\NotificationModule\Notifications\NotificationAbstract;
use Modules\NotificationModule\Traits\NotificationTrait;

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
