<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Services\CustomerService;
use Exception;
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
        try {
            $this->customerService->store($request->all());

            return redirect()->route('pages.customers.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());
            
            return redirect()->route('pages.customers.index');
        }
    }

    public function show(Customer $customer)
    {
        return view('pages.customers.show',compact('customer'));
    }

    public function edit(Customer $customer)
    {

    }

    
    public function update(Request $request, Customer $customer)
    {
        try {
            $this->customerService->update($customer, $request->all());

            return redirect()->route('pages.customers.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('pages.customers.index');
        }
    }

   
    public function destroy(Customer $customer)
    {
        try {
            $this->customerService->destroy($customer);

            return redirect()->route('pages.customers.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('pages.customers.index');
        }
    }
}
