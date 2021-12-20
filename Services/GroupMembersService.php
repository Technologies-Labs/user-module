<?php

// namespace Modules\User\Services;

// use App\Models\User;

// class GroupMembersService
// {
//     public $userId;
//     public $groupId;

//     public function inviteUser()
//     {
//         $user = User::find($this->userId);
//         $user->invitations()->attach($this->groupId);

//         return response()->json([
//             'success'       => ($user) ? true : false,
//             'message'       => ($user) ? 'The user has been successfully invited to the group' : 'Failed to invite user to group',
//         ]);
//     }

//     public function addUser()
//     {
//         $user = User::find($this->userId);
//         $user->invitations()->attach($this->groupId , ['invite_status' => 1]);

//         return response()->json([
//             'success'       => ($user) ? true : false,
//             'message'       => ($user) ? 'The user has been successfully added to the group' : 'Failed to added user to group',
//         ]);
//     }

//     public function setUserId($userId)
//     {
//         $this->userId = $userId;
//         return $this;
//     }

//     public function setGroupId($groupId)
//     {
//         $this->groupId = $groupId;
//         return $this;
//     }
// }
