<?php

namespace Modules\UserModule\Http\Livewire\Follower;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Follow extends Component
{
    public $user;

    public  $currantUser;
    public  $follower;
    public  $isFollower = true;

    public function getFollowersProperty()
    {
        return $this->user->followers();
    }

    public function mount ()
    {
        $this->currantUser    = Auth::user();
        $this->follower       = $this->followers->get()->where('id' ,$this->currantUser->id)->first();
        if ($this->follower){
            $this->isFollower = false;
        }
    }

    public function render()
    {
        return view('usermodule::livewire.follower.follow');
    }

    public function follow()
    {
        if ($this->follower){
            $this->followers->detach($this->currantUser->id);
            $this->isFollower   = !$this->isFollower;
            $this->follower     = null;
            return;
        }
        $this->follower     = $this->followers->sync(["follower_id" => $this->currantUser->id], true);
        $this->isFollower   = !$this->isFollower;

    }
}
