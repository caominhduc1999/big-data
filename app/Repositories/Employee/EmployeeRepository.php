<?php

namespace App\Repositories\Employee;

use App\Repositories\Employee\EmployeeRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Employee;

class EmployeeRepository extends RepositoryAbstract implements EmployeeRepositoryInterface
{
    public function __construct(Employee $employee)
    {
        $this->model = $employee;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
}
