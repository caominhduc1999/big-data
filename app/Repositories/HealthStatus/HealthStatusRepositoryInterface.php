<?php

namespace App\Repositories\HealthStatus;

use App\Repositories\RepositoryInterface;

interface HealthStatusRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage);
}
