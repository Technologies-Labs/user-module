<?php

namespace Modules\UserModule\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\UserModule\Entities\Follower;

class UserProfile extends Component
{
    public $user;
    public $currantUser;
    public $isCurrantUser;
    public $follower;
    public $isFollower        = true;
    public $followersCount    = 0;

    public function getFollowersProperty()
    {
        return $this->user->followers();
    }

    function mount()
    {
        $this->currantUser      = Auth::user();
        $this->isCurrantUser    = $this->currantUser->name === $this->user->name;
        $this->followersCount   = $this->followers->count();

        $this->follower = $this->followers->get()->where('id' ,$this->currantUser->id)->first();
        if ($this->follower){
            $this->isFollower = false;
        }

    }



    public function render()
    {
        return view('usermodule::livewire.user-profile');
    }

    public function follow()
    {
        if ($this->follower){
            $this->followers->detach($this->currantUser->id);
            $this->followersCount--;
            $this->isFollower   = !$this->isFollower;
            $this->follower     = null;
            return;
        }
        $this->follower     = $this->followers->sync(["follower_id" => $this->currantUser->id], true);
        $this->followersCount++;
        $this->isFollower   = !$this->isFollower;

    }
}
