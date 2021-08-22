<?php

namespace Modules\UserModule\Http\Controllers;

use Illuminate\Contracts\Support\Renderable;
use Modules\UserModule\Entities\CompanyCustomerSay;
use Modules\UserModule\Services\CompanyCustomerSayService;
use Modules\UserModule\Http\Requests\CompanyCustomerSayRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompanyCustomerSayController extends Controller
{
    private $CompanyCustomerSayService;

    public function __construct(CompanyCustomerSayService $CompanyCustomerSayService)
    {
       $this->CompanyCustomerSayService = $CompanyCustomerSayService;
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
    public function store(CompanyCustomerSayRequest $request)
    {
        $this->CompanyCustomerSayService->setCustomerName($request->name)
                                        ->setCustomerSay($request->say)
                                        ->setCustomerImage($request->image);
        $this->CompanyCustomerSayService->createCompanyCustomerSay();

        return redirect()->route('')->with('success','Customer_say created successfully');
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
    public function update(CompanyCustomerSayRequest $request, $id)
    {
        $CompanyCustomerSay = CompanyCustomerSay::find($id);
        if(!$CompanyCustomerSay){
            return redirect()->route('')->with('failed',"Customer_say Not Found");
        }

        $this->CompanyCustomerSayService
        ->setCustomerName($request->name)
        ->setCustomerSay($request->say)
        ->updateCustomerImg($request->image ,$CompanyCustomerSay->customer_image);
        $this->CompanyCustomerSayService->updateCompanyCustomerSay($CompanyCustomerSay);

        return redirect()->route('')->with('success','Customer_say updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy($id)
    {
        $CompanyCustomerSay = CompanyCustomerSay::find($id);
        if (!$CompanyCustomerSay) {
            return redirect()->route('')->with('failed',"Customer_say Not Found");
        }
        $CompanyCustomerSay->delete();
        return 'Customer_say deleted ';
    }
}
