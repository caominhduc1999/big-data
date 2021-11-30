<?php

namespace App\Services;

use App\Repositories\HealthStatus\HealthStatusRepositoryInterface;

class HealthStatusService
{
    protected $healthStatusRepository;

    public function __construct(HealthStatusRepositoryInterface $healthStatusRepository)
    {
        $this->healthStatusRepository = $healthStatusRepository;
    }

    public function getAll()
    {
        return $this->healthStatusRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->healthStatusRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->healthStatusRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->healthStatusRepository->delete($id);
    }
}
