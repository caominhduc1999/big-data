<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('pages.auth.login');
    }

    public function postLogin(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'email' => 'required',
            'password' => 'required'
        ]);
        if ($validator->fails()) {
            return redirect('/login')
                        ->withErrors($validator)
                        ->withInput();
        }
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/login');
    }

    public function fakeUser()
    {
        User::create(
            [
                'name' => 'admin',
                'email' => 'admin@admin.com',
                'password' => Hash::make('123456789'),
                'role' => User::ADMIN_ROLE
            ],
            [
                'name' => 'user',
                'email' => 'user@user.com',
                'password' => Hash::make('123456789'),
                'role' => User::USER_ROLE
            ]
        );
    }
}
