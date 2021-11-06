<?php

namespace Modules\UserModule\Http\Livewire\Notification;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\UserModule\Entities\Notification;
use Modules\UserModule\Enum\NotificationTypeEnum;
use Modules\UserModule\Repositories\UserRepository;


class AllNotifications extends Component
{
    use WithPagination;
    private     $userRepository;
    public      $notifications;
    protected   $paginationTheme = 'bootstrap';

    public function __construct()
    {
        $this->userRepository = new UserRepository();

    }

    public function render()
    {
        $this->notifications = $this->userRepository->getUserNotifications(NotificationTypeEnum::USER);

        // foreach ($this->notifications['notifications'] as $notification) {
        //     dd($notification);
        // }

        return view('usermodule::livewire.notification.all-notifications');
    }

    public function readNotification($id)
    {
        $notification = Notification::find($id);
        if (!$notification) {
            return;
        }
        $notification->is_read = 1;
        $notification->save();
    }
}
