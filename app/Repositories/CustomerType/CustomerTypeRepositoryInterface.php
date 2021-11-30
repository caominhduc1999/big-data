<?php

namespace App\Repositories\CustomerType;

use App\Repositories\RepositoryInterface;

interface CustomerTypeRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage);
}
