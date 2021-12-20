<?php

namespace Modules\User\Http\Livewire\Notification;

use Livewire\Component;
use Livewire\WithPagination;
use Modules\Notification\Entities\Notification;
use Modules\Notification\Enums\NotificationTypeEnum;
use Modules\User\Repositories\UserRepository;


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

        return view('user::livewire.notification.all-notifications');
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
