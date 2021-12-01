<?php

namespace App\Services;

use App\Repositories\CustomerType\CustomerTypeRepositoryInterface;

class CustomerTypeService
{
    protected $employeeTypeRepository;

    public function __construct(CustomerTypeRepositoryInterface $customerTypeRepository)
    {
        $this->customerTypeRepository = $customerTypeRepository;
    }

    public function getAll()
    {
        return $this->customerTypeRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->customerTypeRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->customerTypeRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->customerTypeRepository->delete($id);
    }
}
