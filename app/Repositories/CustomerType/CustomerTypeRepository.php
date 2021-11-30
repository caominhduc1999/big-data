<?php

namespace App\Repositories\CustomerType;

use App\Repositories\CustomerType\CustomerTypeRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\CustomerType;

class CustomerTypeRepository extends RepositoryAbstract implements CustomerTypeRepositoryInterface
{
    public function __construct(CustomerType $customer)
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
