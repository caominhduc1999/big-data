<?php

namespace App\Repositories\HealthStatus;

use App\Repositories\HealthStatus\HealthStatusRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\HealthStatus;

class HealthStatusRepository extends RepositoryAbstract implements HealthStatusRepositoryInterface
{
    public function __construct(HealthStatus $healthStatus)
    {
        $this->model = $healthStatus;
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
