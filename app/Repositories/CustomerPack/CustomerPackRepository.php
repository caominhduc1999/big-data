<?php

namespace App\Repositories\CustomerPack;

use App\Repositories\CustomerPack\CustomerPackRepositoryInterface;
use App\Repositories\RepositoryAbstract;
use App\Models\CustomerPack;
use Carbon\Carbon;

class CustomerPackRepository extends RepositoryAbstract implements CustomerPackRepositoryInterface
{
    public function __construct(CustomerPack $customer)
    {
        $this->model = $customer;
    }

    public function paginate($perPage)
    {
        return $this->model
            ->paginate($perPage);
    }
    public function getType()
    {
        return $this->model
            ->toArray();
    }
    public function getRevenue($date)
    {
        $a = $this->model->select('price')->whereBetween('created_at', [Carbon::parse($date)->startOfDay(), Carbon::parse($date)->endOfDay()])->count();
        return $a;
    }

    // public function getTodayAttendance($userId)
    // {
    //     return $this->model->where('user_id', $userId)->whereBetween('created_at', [Carbon::now()->startOfDay(), Carbon::now()->endOfDay()])->first();
    // }
}
