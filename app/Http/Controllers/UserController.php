<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Services\UserService;
use Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function index()
    {
        $users = $this->userService->getAll();

        return view('pages.users.index',compact('users'));
    }

    public function create()
    {
        return view('pages.users.create');
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
        return view('pages.users.edit',['user' => $item]);
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
        return redirect()->route('Users.index')->with('message','Item delete successfully !');
        // try {
        //     $this->UserService->destroy($User);

        //     return redirect()->route('Users.index');
        // } catch (Exception $e) {
        //     Log::error($e->getMessage());

        //     return redirect()->route('Users.index');
        // }
    }
}
