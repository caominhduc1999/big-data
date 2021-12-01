<?php

namespace App\Http\Controllers;

use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Services\EmployeeTypeService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EmployeeTypeController extends Controller
{
    protected $employeeTypeService;

    public function __construct(EmployeeTypeService $employeeTypeService)
    {
        $this->employeeTypeService = $employeeTypeService;
    }

    public function index()
    {
        $employee_types = $this->employeeTypeService->getAll();

        return view('pages.employee_types.index',compact('employee_types'));
    }

    public function create()
    {
        return view('pages.employee_types.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('employee_types/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->employeeTypeService->store($request->all());

            return redirect()->route('employee_types.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('employee_types.index');
        }
    }

    public function show(EmployeeType $employeeType)
    {
        return view('pages.employee_types.show',compact('employee_types'));
    }

    public function edit($id ,EmployeeType $employeeType)
    {
        $item = EmployeeType::find($id);
        return view('pages.employee_types.edit',['employee_types' => $item]);
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('employee_types/editEmployeeType/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->employeeTypeService->update($request->id, $request->all());

            return redirect()->route('employee_types.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('employee_types.index');
        }
    }


    public function destroy($id)
    {
        $item = EmployeeType::find($id);
        $item->delete();
        return redirect()->route('employee_types.index')->with('message','Item delete successfully !');

    }
}
