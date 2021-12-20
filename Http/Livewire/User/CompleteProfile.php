<?php

namespace Modules\User\Http\Livewire\User;

use App\Models\User;
use Livewire\Component;

class CompleteProfile extends Component
{
    public $user;
    public $completeRate = 25;
    public $information = [];

    public function mount()
    {
        $this->information =[
            [
                "name" =>  "full_name",
                "message"   => "Your Full Name?"
            ],
            [
                "name" =>  "phone",
                "message"   => "Your Phone Number"
            ],
            [
                "name" =>  "image",
                "message"   => "Upload Your Picture"
            ]
        ];


        $user = $this->user->toArray();
        foreach ($this->information as $key => $value) {
            if(!empty($user[$value["name"]]) && $user[$value["name"]] != null && !strlen(trim($user[$value["name"]])) == 0){
                $this->completeRate += 25;
                unset($this->information[$key]);
            }
        };
    }
    public function render()
    {
        return view('user::livewire.user.complete-profile');
    }
}
