<?php

namespace App\Repositories\Attendance;

use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Attendance;
use Carbon\Carbon;
use \Illuminate\Support\Facades\DB;

class AttendanceRepository extends RepositoryAbstract implements AttendanceRepositoryInterface
{
    public function __construct(Attendance $attendance)
    {
        $this->model = $attendance;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }

    public function getComerStatistic($date)
    {
        return $this->model->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
    }

    public function getTodayAttendance($userId)
    {
        return $this->model->where('user_id', $userId)->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->first();
    }
}
