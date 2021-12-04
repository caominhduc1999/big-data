<?php

namespace App\Repositories\Attendance;

use App\Repositories\Attendance\AttendanceRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Attendance;

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
}