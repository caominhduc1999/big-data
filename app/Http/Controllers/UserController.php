<?php

namespace App\Http\Controllers;

use App\Models\CustomerType;
use App\Models\EmployeeType;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;
    protected $customerType;
    protected $employeeTypes;

    public function __construct(
        UserService $userService,
        CustomerType $customerType,
        EmployeeType $employeeType
    ) {
        $this->userService = $userService;
        $this->customerType = $customerType;
        $this->employeeType = $employeeType;
    }

    public function index()
    {
        $users = $this->userService->getAll();
        $customerTypes = $this->customerType->all()->pluck('customer_type_name', 'id')->toArray();
        $employeeTypes = $this->employeeType->all()->pluck('name', 'id')->toArray();

        return view('pages.users.index',compact('users', 'customerTypes', 'employeeTypes'));
    }

    public function create()
    {
        $customerTypes = $this->customerType->all();
        $employeeTypes = $this->employeeType->all();
        return view('pages.users.create',compact( 'customerTypes', 'employeeTypes'));
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
            'password' => 'required',
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('users/edit')
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->userService->store($request->all());

            return redirect()->route('users.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('users.index');
        }
    }

    public function show(User $user)
    {
        return view('pages.users.show',compact('user'));
    }

    public function edit($id ,User $user)
    {
        $item = User::find($id);
        $customerTypes = $this->customerType->all();
        $employeeTypes = $this->employeeType->all();
        return view('pages.users.edit',['user' => $item, 'customerTypes' => $customerTypes, 'employeeTypes' => $employeeTypes]);
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
            'role' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('users/editUser/' . $request->id)
                        ->withErrors($validator)
                        ->withInput();
        }
        try {
            $this->userService->update($request->id, $request->all());

            return redirect()->route('users.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('users.index');
        }
    }


    public function destroy($id)
    {
        $item = User::find($id);
        $item->delete();
        return redirect()->route('users.index')->with('message','Item delete successfully !');
        // try {
        //     $this->UserService->destroy($User);

        //     return redirect()->route('Users.index');
        // } catch (Exception $e) {
        //     Log::error($e->getMessage());

        //     return redirect()->route('Users.index');
        // }
    }
}
