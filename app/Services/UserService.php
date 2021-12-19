<?php

namespace App\Services;

use App\Models\User;
use App\Repositories\User\UserRepositoryInterface;

class UserService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getAll()
    {
        return $this->userRepository->paginate(config('constants.per_page'));
    }

    public function store($data)
    {
        if ($data['role'] == 1) {
            $data['employee_type_id'] = null;
        }

        if ($data['role'] == 2) {
            $data['customer_type_id'] = null;
        }

        if ($data['role'] == 0) {
            $data['customer_type_id'] = null;
            $data['employee_type_id'] = null;
        }

        if (isset($data['image'])) {
            $image = $data['image'];
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }
        
        return $this->userRepository->store($data);
    }

    public function update($id, $data)
    {
        if ($data['role'] == 1) {
            $data['employee_type_id'] = null;
        }

        if ($data['role'] == 2) {
            $data['customer_type_id'] = null;
        }

        if ($data['role'] == 0) {
            $data['customer_type_id'] = null;
            $data['employee_type_id'] = null;
        }
        
        if ($data['image']) {
            $image = $data['image'];
            $imageName = rand() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('images'), $imageName);
            $data['image'] = $imageName;
        }

        return $this->userRepository->update($id, $data);
    }

    public function destroy($id)
    {
        return $this->userRepository->delete($id);
    }

    public function getTotalCustomer()
    {
        return $this->userRepository->getTotalCustomer();
    }

    public function getTotalStaff()
    {
        return $this->userRepository->getTotalStaff();
    }
}