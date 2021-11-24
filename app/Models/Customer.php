<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Jenssegers\Mongodb\Eloquent\Model as EloquentModel;

class Customer extends EloquentModel
{
    use HasFactory;
    protected $connection = 'mongodb';
	protected $collection = 'Customers';

    protected $fillable = [
        'name', 'detail'
    ];
}
