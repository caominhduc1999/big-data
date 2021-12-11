<?php

namespace App\Http\Controllers;

use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Services\AttendanceService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $attendanceService;

    public function __construct(AttendanceService $attendanceService)
    {
        $this->attendanceService = $attendanceService;
    }

    public function index()
    {
        $comerDataset = array();
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);          
            if (date('m', $time) == $month)   
                $date = date('Y-m-d', $time);    
                $comerDataset[$date] = $this->attendanceService->getComerStatistic($date);
        }
        // dd($comerDataset);
        return view('pages.index', compact('comerDataset'));
    }
}
