<?php

namespace App\Services;

use App\Repositories\Exercise\ExerciseRepositoryInterface;

class ExerciseService
{
    protected $exerciseRepository;

    public function __construct(ExerciseRepositoryInterface $exerciseRepository)
    {
        $this->exerciseRepository = $exerciseRepository;
    }

    public function getAll()
    {
        return $this->exerciseRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->exerciseRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->exerciseRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->exerciseRepository->delete($id);
    }
}
