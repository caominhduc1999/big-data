<?php

namespace App\Services;

use App\Repositories\Employee\EmployeeRepositoryInterface;

class EmployeeService
{
    protected $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function getAll()
    {
        return $this->employeeRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->employeeRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->employeeRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->employeeRepository->delete($id);
    }
}
