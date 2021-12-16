<?php

namespace App\Repositories\User;

use App\Repositories\User\UserRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\User;

class UserRepository extends RepositoryAbstract implements UserRepositoryInterface
{
    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }

    public function getTotalCustomer()
    {
        return $this->model->where('role', "1")->count();
    }

    public function getTotalStaff()
    {
        return $this->model->where('role', "2")->count();
    }
}