<?php

namespace App\Repositories\CustomerPack;

use App\Repositories\CustomerPack\CustomerPackRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\CustomerPack;

class CustomerPackRepository extends RepositoryAbstract implements CustomerPackRepositoryInterface
{
    public function __construct(CustomerPack $customer)
    {
        $this->model = $customer;
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
