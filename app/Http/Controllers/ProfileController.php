<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use Illuminate\Http\Request;
use App\Services\ProfileService;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Log;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Carbon;

class ProfileController extends Controller
{
    protected $profileService;

    public function __construct(ProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function detail()
    {
        $profile = $this->profileService->getProfile();

        return view('pages.profile.detail', compact('profile'));
    }

    public function edit()
    {
        $profile = $this->profileService->getProfile();

        return view('pages.profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $validator = Validator::make($request->all() ,[
            'name' => 'required',
        ]);
        if ($validator->fails()) {
            return redirect('profile/edit')
                        ->withErrors($validator)
                        ->withInput();
        }

        try {
            $this->profileService->update(Auth::user()->_id, $request->all());

            return redirect()->route('profile.detail');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('profile.detail');
        }
    }
}
