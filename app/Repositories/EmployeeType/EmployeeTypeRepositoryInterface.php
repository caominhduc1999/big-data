<?php

namespace App\Repositories\EmployeeType;

use App\Repositories\RepositoryInterface;

interface EmployeeTypeRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage);
}
