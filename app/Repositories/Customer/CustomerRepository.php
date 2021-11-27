<?php

namespace App\Repositories\Customer;

use App\Repositories\Customer\CustomerRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Customer;

class CustomerRepository extends RepositoryAbstract implements CustomerRepositoryInterface
{
    public function __construct(Customer $customer)
    {
        $this->model = $customer;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
}