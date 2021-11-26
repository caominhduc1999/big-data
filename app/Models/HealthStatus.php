<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HealthStatus extends BaseModel
{
    use HasFactory;
    protected $collection = 'health_status';

    protected $fillable = [
        '_id',
        'customer_id',
        'calories',
        'fat_percentage',
        'height',
        'weight',
        'remark',
    ];
}
