<?php

namespace Modules\User\Notifications;

use App\Actions\Notification\SendBellNotificationAction;
use Modules\Notification\Entities\Notification;
use Modules\Notification\Enums\NotificationTypeEnum;
use Modules\Notification\Notifications\NotificationAbstract;
use Modules\Notification\Traits\NotificationTrait;

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
