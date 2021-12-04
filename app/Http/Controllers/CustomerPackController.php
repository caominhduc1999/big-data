<?php

namespace App\Http\Controllers;

use App\Models\CustomerPack;
use Illuminate\Http\Request;
use App\Services\CustomerPackService;
use App\Services\CustomerService;
use App\Services\ServiceService;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CustomerPackController extends Controller
{
    protected $customerPackService;
    protected $customerService;

    public function __construct(
        CustomerPackService $customerPackService ,
        UserService $customerService,
        ServiceService $serviceService){
        $this->customerPackService = $customerPackService;
        $this->customerService = $customerService;
        $this->serviceService = $serviceService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_packs = $this->customerPackService->getAll();
        $customer = $this->customerService->getAll()->pluck('name','_id')->toArray();
        $service = $this->serviceService->getAll()->pluck('name','_id')->toArray();
        return view('pages.customer_packs.index',compact('customer_packs','customer','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = $this->customerService->getAll();
        $services = $this->serviceService->getAll();
        return view('pages.customer_packs.create',compact('customers','services'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer_packs/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerPackService->store($request->all());

            return redirect()->route('customer_packs.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customer_packs.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('pages.customer_packs.show',compact('customer_packs'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id , CustomerPack $customerPack)
    {
        $item = CustomerPack::find($id);
        $customers = $this->customerService->getAll();
        $services = $this->serviceService->getAll();
        return view('pages.customer_packs.edit',['customer_packs' => $item],compact('customers','services','item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer_packs/editCustomerPack/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerPackService->update($request->id, $request->all());

            return redirect()->route('customer_packs.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customer_packs.index');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CustomerPack::find($id);
        $item->delete();
        return redirect()->route('customer_packs.index')->with('message','Item delete successfully !');
    }
}
