<?php

namespace App\Repositories\EmployeeType;

use App\Repositories\EmployeeType\EmployeeTypeRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\EmployeeType;

class EmployeeTypeRepository extends RepositoryAbstract implements EmployeeTypeRepositoryInterface
{
    public function __construct(EmployeeType $employee)
    {
        $this->model = $employee;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
    public function getType()
    {
        return $this->model
            ->toArray();
    }
}
