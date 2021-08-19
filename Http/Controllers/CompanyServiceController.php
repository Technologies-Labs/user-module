<?php

namespace Modules\UserModule\Http\Controllers;

use Modules\UserModule\Entities\CompanyService;
use Modules\UserModule\Services\CompanyServiceService;
use Illuminate\Contracts\Support\Renderable;
use Modules\UserModule\Http\Requests\CompanyServiceRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyServiceController extends Controller
{

    private $companyServiceService;

    public function __construct(CompanyServiceService $companyServiceService)
    {
        $this->companyServiceService = $companyServiceService;
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
    public function store(CompanyServiceRequest $request)
    {
        $this->companyServiceService->setCompanyId($request->company_id)
                                    ->setName($request->name)
                                    ->setDescription($request->description);
        if($request->has('image')){
        $this->companyServiceService->setImage($request->image);
        }
        $this->companyServiceService->createCompanyService();

        return redirect()->route('')->with('success','Company Service created successfully');
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
    public function update(CompanyServiceRequest $request, $id)
    {
        $companyService = CompanyService::find($id);
        if(!$companyService){
            return redirect()->route('')->with('failed',"Company Service Not Found");
        }

        $this->companyServiceService->setName($request->name)
                                    ->setDescription($request->description);
        if($request->has('image'))
        {
        $this->companyServiceService->updateImg($request->image ,$companyService->image);
        }

        $this->companyServiceService->updateCompanyService($companyService);

        return redirect()->route('')->with('success','Company Service updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $companyService = CompanyService::find($id);
        if (!$companyService) {
            return redirect()->route('')->with('failed',"Company Service Not Found");
        }
        $companyService->delete();
        return 'Company Service deleted ';
    }
}
