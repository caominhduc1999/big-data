<?php

namespace App\Services;

use App\Repositories\Customer\CustomerRepositoryInterface;

class CustomerService
{
    protected $customerRepository;

    public function __construct(CustomerRepositoryInterface $customerRepository)
    {
        $this->customerRepository = $customerRepository;
    }

    public function getAll()
    {
        return $this->customerRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        return $this->customerRepository->store($data);
    }

    public function update($id, $data)
    {
        return $this->customerRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->customerRepository->delete($id);
    }
}