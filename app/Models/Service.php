<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

class Service extends BaseModel
{
    use HasFactory;
    protected $collection = 'services';

    protected $fillable = [
        '_id',
        'name',
        'description',
        'price',
    ];
}
