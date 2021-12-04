<?php

namespace App\Http\Controllers;

use App\Models\HealthStatus;
use Illuminate\Http\Request;
use App\Services\HealthStatusService;
use App\Services\CustomerService;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class HealthStatusController extends Controller
{
    protected $healthStatusService;
    protected $customerService;


    public function __construct(HealthStatusService $healthStatusService , UserService $customerService )
    {
        $this->healthStatusService = $healthStatusService;
        $this->customerService = $customerService;
    }

    public function index()
    {
        $healths = $this->healthStatusService->getAll();
        $customer = $this->customerService->getAll()->pluck('name','_id')->toArray();
        return view('pages.health_statuses.index',compact('healths','customer'));
    }

    public function create()
    {
        $customers = $this->customerService->getAll();
        return view('pages.health_statuses.create', compact('customers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('health_statuses/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->healthStatusService->store($request->all());

            return redirect()->route('health_statuses.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('health_statuses.index');
        }
    }

    public function show(HealthStatus $healthStatus)
    {
        return view('pages.health_statuses.show');
    }

    public function edit($id ,HealthStatus $healthStatus)
    {
        $item = HealthStatus::find($id);
        $customers = $this->customerService->getAll();
        return view('pages.health_statuses.edit',['health_status' => $item],compact('customers','item'));
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'customer_id' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('health_statuses/editStatus/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->healthStatusService->update($request->id, $request->all());

            return redirect()->route('health_statuses.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('health_statuses.index');
        }
    }


    public function destroy($id)
    {
        $item = HealthStatus::find($id);
        $item->delete();
        return redirect()->route('health_statuses.index')->with('message','Item delete successfully !');

    }
}
