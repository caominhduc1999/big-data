<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CustomerPack extends BaseModel
{
    use HasFactory;
    protected $collection = 'customer_packs';

    protected $fillable = [
        '_id',
        'customer_id',
        'service_id',
        'payment_id',
        'price',
        'start_date',
        'end_date',
    ];
}
