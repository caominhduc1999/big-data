<?php

namespace App\Repositories\Exercise;

use App\Repositories\Exercise\ExerciseRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\Exercise;

class ExerciseRepository extends RepositoryAbstract implements ExerciseRepositoryInterface
{
    public function __construct(Exercise $exercise)
    {
        $this->model = $exercise;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
}
