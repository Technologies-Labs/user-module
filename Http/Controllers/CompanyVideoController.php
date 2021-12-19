<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\UserModule\Entities\CompanyVideo;
use Modules\UserModule\Services\CompanyVideoService;
use Modules\UserModule\Http\Requests\CompanyVideoRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyVideoController extends Controller
{
    private $companyVideoService;

    public function __construct(CompanyVideoService $companyVideoService)
    {
        $this->companyVideoService = $companyVideoService;
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        return view('usermodule::index');
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
    public function store(CompanyVideoRequest $request)
    {
       $this->companyVideoService->setVideo($request->company_video)->createCompanyVideo();
       return redirect()->route('')->with('Success',"Company_video created");
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
    public function update(CompanyVideoRequest $request, $id)
    {
        $companyVideo = CompanyVideo::find($id);
        if(!$companyVideo){
            return redirect()->route('')->with('failed',"Company_video Not Found");
        }
        $this->companyVideoService->updateVideo($request->company_video, $companyVideo->company_video);
        $this->companyVideoService->updateCompanyVideo($companyVideo);
        return redirect()->route('')->with('Success',"Company_video updated");
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $companyVideo = CompanyVideo::find($id);
        if(!$companyVideo){
            return redirect()->route('')->with('failed',"Company_video Not Found");
        }
        $companyVideo->delete();
        return 'Company_video deleted';
    }
}
