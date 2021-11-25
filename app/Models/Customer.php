<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Jenssegers\Mongodb\Eloquent\Model as Model;

class Customer extends BaseModel
{
    use HasFactory;
	protected $collection = 'customers';

    protected $fillable = [
        '_id',
        'identification',
        'identification_type',
        'photo',
        'name',
        'birthday',
        'address',
        'email',
        'phone',
        'gender',
        'employee_id',
        'closet_no',
    ];
}
