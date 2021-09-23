<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;
use Modules\UserModule\Entities\UserGroup;
use Modules\UserModule\Services\UserGroupService;
use Modules\UserModule\Repositories\UserGroupRepository;
use Modules\UserModule\http\Requests\UserGroupRequest;

class UserGroupController extends Controller
{
    private $userGroupService;
    private $userGroupRepository;

    public function __construct(UserGroupService $userGroupService , UserGroupRepository $userGroupRepository)
    {
        $this->userGroupService     = $userGroupService;
        $this->userGroupRepository  = $userGroupRepository;
    }
    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $user       = Auth::user();
        $userGroups = $this->userGroupRepository->getAllUserGroup($user->id);
        return view('usermodule::index' , compact('userGroups'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('usermodule::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(UserGroupRequest $request)
    {
        $user = Auth::user();
        $userGroup = $this->userGroupService
        ->setUser($user)
        ->setName($request->group_name)
        ->setDescription($request->group_description)
        ->setImage($request->group_image)
        ->setIsPublic($request->is_public)
        ->createUserGroup()
        ->getData();

        return redirect()->back()->with($userGroup->success,$userGroup->message);
    }

    /**
     * Show the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function show($id)
    {
        return view('usermodule::show');
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit($id)
    {
        return view('usermodule::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        //
    }
}
