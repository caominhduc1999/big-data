<?php

namespace App\Services;

use App\Repositories\User\UserRepositoryInterface;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileService
{
    protected $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function getProfile()
    {
        return $this->userRepository->get(Auth::id());
    }

    public function update($id, $data)
    {
        return $this->userRepository->update($id, $data);
    }
}