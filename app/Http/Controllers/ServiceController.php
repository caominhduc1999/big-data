<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use App\Services\ServiceService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class ServiceController extends Controller
{
    protected $serviceService;


    public function __construct(ServiceService $serviceService )
    {
        $this->serviceService = $serviceService;
    }

    public function index()
    {
        $services = $this->serviceService->getAll();
        //dd($types);
        return view('pages.services.index',compact('services'));
    }

    public function create()
    {
        return view('pages.services.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('services/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->serviceService->store($request->all());

            return redirect()->route('services.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('services.index');
        }
    }

    public function show(Service $service)
    {
        return view('pages.services.show',compact('services'));
    }

    public function edit($id ,Service $service)
    {
        $item = Service::find($id);
        return view('pages.services.edit',['service' => $item]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('service/editService/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->serviceService->update($request->id, $request->all());

            return redirect()->route('services.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('services.index');
        }
    }


    public function destroy($id)
    {
        $item = Service::find($id);
        $item->delete();
        return redirect()->route('services.index')->with('message','Item delete successfully !');

    }
}
