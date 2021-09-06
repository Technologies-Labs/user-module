<?php

namespace Modules\UserModule\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Services\UserService;

class UserSettingController extends Controller
{
    private $userService;

    public function __construct()
    {
        $this->userService = new UserService();
    }

    public function edit($name)
    {
        $user           = User::where('name' , $name)->first();
        if (!$user){
            abort(404);
        }

        $currantUser    = Auth::user();
        $isCurrantUser  = $currantUser->name === $user->name;
        return view('usermodule::website.user-account-settings',compact('user','isCurrantUser'));
    }

    public function editLogo(Request $request)
    {
        $this->userService->setLogo($request->input('logo'));
        $this->userService ->updateUser(Auth::user());
        return redirect()->route('edit.profile',Auth::user()->name);
    }

    public function editImage(Request $request)
    {
        $this->userService->setImage($request->input('image'));
        $this->userService ->updateUser(Auth::user());
        return redirect()->route('edit.profile',Auth::user()->name);
    }
}
