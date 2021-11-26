<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Customer_Type extends BaseModel
{
    use HasFactory;
    protected $collection = 'customer_types';

    protected $fillable = [
        '_id',
        'customer_type_name',
        'description',
    ];
}
