<?php

namespace Modules\UserModule\Repositories;

use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Entities\Contact;
use App\Traits\UploadTrait;
use Illuminate\Http\Request;

use function PHPUnit\Framework\isNull;
class UserRepository {

    use UploadTrait;

/**
     * Get User Notifications
*/
    public function getUserNotifications($type) {

        if($type == "notifications") {
        return Auth::user()->notifications->where('is_financial' , 0)->where('is_read' , 0)->sortByDesc('updated_at')->take(5);
        }
        else if($type == "financial") {
        return Auth::user()->notifications->where('is_financial' , 1)->where('is_read' , 0)->sortByDesc('updated_at')->take(5);
        }
    }

/**
     * Contact user with website
*/

    public function contact(Request $req) {

        $req->validate($req, [
            'name'      => 'required',
            'email'     => 'required|email',
            'message'   => 'required',
            'file'      => 'nullable',
        ]);

        if(!isNull($req->file)){
            $file = $this->uploadOne($req->file , 'assets/files/contacts');
        }
        else {
            $file = null;
        }

       return Contact::create([
        'name'      => $req->name,
        'email'     => $req->email,
        'message'   => $req->message,
        'file'      => $file,
        ]);
    }
}
