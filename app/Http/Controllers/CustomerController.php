<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class CustomerController extends Controller
{
    protected $customerService;

    public function __construct(CustomerService $customerService)
    {
        $this->customerService = $customerService;
    }

    public function index()
    {
        $customers = $this->customerService->getAll();

        return view('pages.customers.index',compact('customers'));
    }

    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customers/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerService->store($request->all());

            return redirect()->route('customers.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customers.index');
        }
    }

    public function show(Customer $customer)
    {
        return view('pages.customers.show',compact('customer'));
    }

    public function edit($id ,Customer $customer)
    {
        $item = Customer::find($id);
        return view('pages.customers.edit',['customer' => $item]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
            'birthday' => 'required',
            'address' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'gender' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('customers/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->customerService->update($request->id, $request->all());

            return redirect()->route('customers.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('customers.index');
        }
    }


    public function destroy($id)
    {
        $item = Customer::find($id);
        $item->delete();
        return redirect()->route('customers.index')->with('message','Item delete successfully !');
        // try {
        //     $this->customerService->destroy($customer);

        //     return redirect()->route('customers.index');
        // } catch (Exception $e) {
        //     Log::error($e->getMessage());

        //     return redirect()->route('customers.index');
        // }
    }
}
