<?php

namespace App\Services;

use App\Repositories\CustomerPack\CustomerPackRepositoryInterface;

class CustomerPackService
{
    protected $customerPackRepository;

    public function __construct(CustomerPackRepositoryInterface $customerPackRepository)
    {
        $this->customerPackRepository = $customerPackRepository;
    }

    public function getAll()
    {
        return $this->customerPackRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->customerPackRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->customerPackRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->customerPackRepository->delete($id);
    }
    public function getRevenue($date)
    {
        return $this->customerPackRepository->getRevenue($date);
    }
    public function getCutomerPackAmount($date)
    {
        return $this->customerPackRepository->getCutomerPackAmount($date);
    }
}
