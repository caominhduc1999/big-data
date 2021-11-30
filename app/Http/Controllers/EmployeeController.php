<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\EmployeeType;
use Illuminate\Http\Request;
use App\Services\EmployeeService;
use App\Services\EmployeeTypeService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class EmployeeController extends Controller
{
    protected $employeeService;
    protected $employeeTypeService;


    public function __construct(EmployeeService $employeeService , EmployeeTypeService $employeeTypeService)
    {
        $this->employeeService = $employeeService;
        $this->employeeTypeService = $employeeTypeService;
    }

    public function index()
    {
        $employees = $this->employeeService->getAll();
        $types = $this->employeeTypeService->getAll()->pluck('name','_id')->toArray();
        //dd($types);
        return view('pages.employees.index',compact('employees','types'));
    }

    public function create()
    {
        $type = $this->employeeTypeService->getAll();
        return view('pages.employees.create', compact('type'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
            'birthday' => 'required',
            'gender' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('employees/create')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->employeeService->store($request->all());

            return redirect()->route('employees.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('employees.index');
        }
    }

    public function show(Employee $employee)
    {
        return view('pages.employees.show',compact('employee'));
    }

    public function edit($id ,Employee $employee)
    {
        $item = Employee::find($id);
        $type = $this->employeeTypeService->getAll();
        return view('pages.employees.edit',['employee' => $item],compact('type','item'));
    }


    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
            'birthday' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('employees/editEmployee/'.$request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->employeeService->update($request->id, $request->all());

            return redirect()->route('employees.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('employees.index');
        }
    }


    public function destroy($id)
    {
        $item = Employee::find($id);
        $item->delete();
        return redirect()->route('employees.index')->with('message','Item delete successfully !');

    }
}
