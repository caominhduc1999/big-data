<?php

namespace App\Services;

use App\Repositories\Attendance\AttendanceRepositoryInterface;

class AttendanceService
{
    protected $attendanceRepository;

    public function __construct(AttendanceRepositoryInterface $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
    }

    public function getAll()
    {
        return $this->attendanceRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->attendanceRepository->store($data);
    }

    public function getComerStatistic($date)
    {
        return $this->attendanceRepository->getComerStatistic($date);
    }

    public function getTodayAttendance($userId)
    {
        return $this->attendanceRepository->getTodayAttendance($userId);
    }
}