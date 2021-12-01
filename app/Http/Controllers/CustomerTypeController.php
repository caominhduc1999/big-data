<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use Illuminate\Http\Request;
use App\Services\CustomerTypeService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CustomerTypeController extends Controller
{
    protected $customerTypeService;
    public function __construct(CustomerTypeService $customerTypeService){
        $this->customerTypeService = $customerTypeService;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customer_types = $this->customerTypeService->getAll();

        return view('pages.customer_types.index',compact('customer_types'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.customer_types.create');
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
            'customer_type_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer_types/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerTypeService->store($request->all());

            return redirect()->route('customer_types.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customer_types.index');
        }
    }

    public function show(CustomerType $customerType)
    {
        return view('pages.customer_types.show',compact('customer_types'));
    }

    public function edit($id ,CustomerType $customerType)
    {
        $item = CustomerType::find($id);
        return view('pages.customer_types.edit',['customer_types' => $item]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'customer_type_name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customer_types/editCustomerType/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerTypeService->update($request->id, $request->all());

            return redirect()->route('customer_types.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customer_types.index');
        }
    }


    public function destroy($id)
    {
        $item = CustomerType::find($id);
        $item->delete();
        return redirect()->route('customer_types.index')->with('message','Item delete successfully !');

    }
}
