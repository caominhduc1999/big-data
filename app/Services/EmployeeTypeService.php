<?php

namespace App\Services;

use App\Repositories\EmployeeType\EmployeeTypeRepositoryInterface;

class EmployeeTypeService
{
    protected $employeeTypeRepository;

    public function __construct(EmployeeTypeRepositoryInterface $employeeTypeRepository)
    {
        $this->employeeTypeRepository = $employeeTypeRepository;
    }

    public function getAll()
    {
        return $this->employeeTypeRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->employeeTypeRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->employeeTypeRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->employeeTypeRepository->delete($id);
    }
}
