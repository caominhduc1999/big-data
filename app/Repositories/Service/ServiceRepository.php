<?php

namespace App\Repositories\Service;

use App\Repositories\Service\ServiceRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Service;

class ServiceRepository extends RepositoryAbstract implements ServiceRepositoryInterface
{
    public function __construct(Service $service)
    {
        $this->model = $service;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
}
