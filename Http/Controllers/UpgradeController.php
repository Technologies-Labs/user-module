<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Entities\Upgrade;
use Modules\UserModule\Services\UpgradeService;

class UpgradeController extends Controller
{
    public function upgrade(Request $request)
    {
        $user = Auth::user();
        $upgradeService = (new UpgradeService())
            ->setCurrentPackage($user->roles->first()->name)
            ->setNextPackage($request['package'])
            ->setUser($user);
        $upgrade = $upgradeService->createUpgrade()->getData();

        return redirect()->back()->with($upgrade->success,$upgrade->message);
    }
}
