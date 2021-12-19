<?php

// namespace Modules\UserModule\Http\Livewire;

// use App\Models\User;
// use Auth;
// use Livewire\Component;
// use Modules\UserModule\Entities\SocialMediaAccount;
// use Modules\UserModule\Repositories\UserRepository;

// class UserSocialMediaAccounts extends Component
// {
//     public $accounts;
//     public $facebook;
//     public $twitter;
//     public $instegram;
//     public $linkedIn;
//     public $whatsApp;

//     public function mount()
//     {
//         $this->facebook     = $this->accounts->facebook;
//         $this->twitter      = $this->accounts->twitter;
//         $this->instegram    = $this->accounts->instegram;
//         $this->linkedIn     = $this->accounts->linkedIn;
//         $this->whatsApp     = $this->accounts->whatsApp;
//     }

//     public function render()
//     {
//         return view('usermodule::livewire.user-social-media-accounts');
//     }

//     protected $rules=[
//         'facebook'         => 'nullable|String',
//         'twitter'          => 'nullable|string',
//         'instegram'        => 'nullable|string',
//         'linkedIn'         => 'nullable|string',
//         'whatsApp'         => 'nullable|string',
//     ];

//     public function update()
//     {
//         $this->validate($this->rules);

//         $accounts = SocialMediaAccount::find($this->accounts->id);
//         if(!$accounts)
//         {
//             session()->flash('message', 'not your accounts');
//             return ;
//         }

//         $accounts->update([
//             'facebook'         => $this->facebook,
//             'twitter'          => $this->twitter,
//             'instegram'        => $this->instegram,
//             'linkedIn'         => $this->linkedIn,
//             'whatsApp'         => $this->whatsApp,
//         ]);
//         session()->flash('message', 'your social media account updated succesfully');
//     }
// }
