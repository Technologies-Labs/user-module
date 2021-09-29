<?php

namespace Modules\UserModule\Services;

use App\Models\User;

class GroupMembersService
{
    public $userId;
    public $groupId;

    public function inviteUser()
    {
        $user = User::find($this->userId);
        $user->invitations()->attach($this->groupId);

        return response()->json([
            'success'       => ($user) ? true : false,
            'message'       => ($user) ? 'The user has been successfully invited to the group' : 'Failed to invite user to group',
        ]);
    }
    public function setUserId($userId)
    {
        $this->userId = $userId;
        return $this;
    }

    public function setGroupId($groupId)
    {
        $this->groupId = $groupId;
        return $this;
    }
}
