<?php

namespace Modules\UserModule\Services;

use Livewire\WithFileUploads;
use Modules\UserModule\Entities\Announcement;

class AnnouncementService
{
    use WithFileUploads;

    public $user_id;
    public $opponent_id	;
    public $details;
    public $file;

    public function createAnnouncement()
    {
        $announcement = Announcement::create(
            [
                'user_id'         => $this->user_id,
                'opponent_id'     => $this->opponent_id	,
                'details'         => $this->details,
                'file'            => $this->file
            ]);

        return response()->json([
            'success'       => ($announcement) ? true : false,
            'message'       => ($announcement) ? 'Announcement created successfully' : 'Announcement Failed created',
        ]);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setOpponentID($opponent_id)
    {
        $this->opponent_id = $opponent_id;
        return $this;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function setFile($file)
    {
        $this->file = $file->store('announcement','public');
        return $this;
    }
}
