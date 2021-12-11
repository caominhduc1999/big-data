<?php

namespace App\Http\Controllers;

use App\Repositories\Attendance\AttendanceRepositoryInterface;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class QrCodeController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceRepositoryInterface $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }
    public function index()
    {
        return view('pages.qr_code.index');
    }

    public function store(Request $request)
    {
        try {
            $data = [
                'user_id' => Auth::id()
            ];
            $visitor = $this->attendanceService->getTodayAttendance($data['user_id']);
            if (!$visitor) {
                $this->attendanceService->store($data);
            } else {
                $this->attendanceService->update($visitor->id, ['updated_at' => Carbon::now()]);
            }

            return redirect()->route('qr_code.index')->with('success', 'Checked in!');
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return redirect()->route('qr_code.index');
        }
       
    }
}
