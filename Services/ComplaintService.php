<?php

namespace Modules\User\Services;

use Livewire\WithFileUploads;
use Modules\User\Entities\Complaint;

class ComplaintService{

    use WithFileUploads;

    public $user_id;
    public $details;
    public $file;

    public function createComplaint(){
        $complaint = Complaint::create(
            [
                'user_id' => $this->user_id,
                'details' => $this->details,
                'file'    => $this->file
            ]);

        return response()->json([
            'success'       => ($complaint) ? true : false,
            'message'       => ($complaint) ? 'Complaint created successfully' : 'Complaint Failed created',
        ]);
    }

    public function setUserID($user_id)
    {
        $this->user_id = $user_id;
        return $this;
    }

    public function setDetails($details)
    {
        $this->details = $details;
        return $this;
    }

    public function setFile($file)
    {
        if ($file)
            $this->file = $file->store('suggestions');
        return $this;
    }
}
