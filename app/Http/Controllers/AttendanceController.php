<?php

namespace App\Http\Controllers;

use App\Services\AttendanceService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Exception;
use Illuminate\Support\Facades\Log;

class AttendanceController extends Controller
{
    protected $attendanceService;
    protected $userService;

    public function __construct(AttendanceService $attendanceService, UserService $userService)
    {
        $this->attendanceService = $attendanceService;
        $this->userService = $userService;
    }

    public function index()
    {
        $attendances = $this->attendanceService->getAll();
        $users = $this->userService->getAll()->pluck('name','_id')->toArray();

        return view('pages.attendances.index',compact('attendances', 'users'));
    }

    public function store(Request $request)
    {
        try {
            $this->attendanceService->store($request->all());

            return redirect()->route('attendances.index');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('attendances.index');
        }
    }
}
