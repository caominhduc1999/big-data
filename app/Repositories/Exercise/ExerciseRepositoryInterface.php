<?php

namespace App\Repositories\Exercise;

use App\Repositories\RepositoryInterface;

interface ExerciseRepositoryInterface extends RepositoryInterface
{
    public function paginate($perPage);
}
