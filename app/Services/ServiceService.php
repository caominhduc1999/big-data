<?php

namespace App\Services;

use App\Repositories\Service\ServiceRepositoryInterface;

class ServiceService
{
    protected $serviceRepository;

    public function __construct(ServiceRepositoryInterface $serviceRepository)
    {
        $this->serviceRepository = $serviceRepository;
    }

    public function getAll()
    {
        return $this->serviceRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->serviceRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->serviceRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->serviceRepository->delete($id);
    }
}
