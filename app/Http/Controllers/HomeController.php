<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Services\AttendanceService;
use App\Services\CustomerPackService;
use App\Services\ExerciseService;
use App\Services\UserService;
use Carbon\Carbon;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    protected $attendanceService;
    protected $customerPackService;
    protected $exerciseService;
    protected $userService;

    public function __construct(
        AttendanceService $attendanceService,
        ExerciseService $exerciseService,
        UserService $userService,
        CustomerPackService $customerPackService
    ) {
        $this->attendanceService = $attendanceService;
        $this->exerciseService = $exerciseService;
        $this->userService = $userService;
        $this->customerPackService = $customerPackService;
    }

    public function index()
    {
        $comerDataset = array();
        $customerPack = array();
        $now = Carbon::now();
        $month = $now->month;
        $year = $now->year;

        for($d=1; $d<=31; $d++)
        {
            $time = mktime(12, 0, 0, $month, $d, $year);
            if (date('m', $time) == $month)
                $date = date('Y-m-d', $time);
                $comerDataset[$date] = $this->attendanceService->getComerStatistic($date);
                $revenue[$date] = $this->customerPackService->getRevenue($date);
                $customerPack[$date] = $this->customerPackService->getCutomerPackAmount($date);
        }

        $userTotal = $this->userService->getTotalCustomer();
        $staffTotal = $this->userService->getTotalStaff();
        $exercises = $this->exerciseService->getTotalExercise();

        return view('pages.index', compact('comerDataset', 'userTotal', 'staffTotal', 'exercises', 'revenue', 'customerPack'));
    }
}
