<?php

namespace Modules\UserModule\Notifications;

use App\Models\User;
use Modules\NotificationModule\Notifications\NotificationAbstract;

use Modules\ProductModule\Jobs\FollowersBellNotificationJob;
use Modules\UserModule\Entities\Offer;

class OfferNotification extends NotificationAbstract
{
    private $message;

    public Offer $offer;
    public User $user;

    public function setOffer(Offer $offer)
    {
        $this->offer = $offer;
        return $this;
    }

    public function setUser(User $user)
    {
        $this->user = $user;
        return $this;
    }

    public function setCreateOfferMessage()
    {
        $search             = array('user_full_name' , 'offer_details');
        $replace            = array($this->user->full_name ,  $this->offer->details);
        $this->message      = str_replace($search, $replace, $this->template->content);
        return $this;
    }

    public function handle()
    {
        $action     = new FollowersBellNotificationJob();
        $action->onQueue('bell-notification')->execute($this->user , $this->message);
    }
}
