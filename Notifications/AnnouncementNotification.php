<?php

namespace Modules\UserModule\Notifications;

use App\Actions\Notification\SendBellNotificationAction;
use Modules\NotificationModule\Entities\Notification;
use Modules\NotificationModule\Enums\NotificationTypeEnum;
use Modules\NotificationModule\Notifications\NotificationAbstract;
use Modules\NotificationModule\Traits\NotificationTrait;

class AnnouncementNotification extends NotificationAbstract
{
    use NotificationTrait;
    public $user;
    public $opponent;
    public function setUser($user)
    {
        $this->user = $user;
        return $this;
    }

    public function setOpponent($opponent)
    {
        $this->opponent = $opponent;
        return $this;
    }

    public function handle()
    {
        $search     = array('user_full_name');
        $replace    = array($this->opponent->full_name);
        $message    = str_replace($search, $replace, $this->template->content);

        $this->createNotification($this->user,NotificationTypeEnum::USER ,$message);
    }
}
