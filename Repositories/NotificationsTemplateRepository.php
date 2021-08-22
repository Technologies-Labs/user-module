<?php

namespace Modules\UserModule\Repositories;
use Modules\UserModule\Entities\NotificationsTemplate;

class NotificationsTemplateRepository
{
    public function getNotificationsTemplates()
    {
        return NotificationsTemplate::get();
    }

}
