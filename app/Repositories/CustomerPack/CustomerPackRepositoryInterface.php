<?php

namespace App\Repositories\CustomerPack;

use App\Repositories\RepositoryInterface;

interface CustomerPackRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage);
}
