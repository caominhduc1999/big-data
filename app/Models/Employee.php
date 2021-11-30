<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\BaseModel;

class Employee extends BaseModel
{
    use HasFactory;
    protected $collection = 'employees';

    protected $fillable = [
        '_id',
        'employee_type_id',
        'name',
        'birthday',
        'gender',
        'hire_date',
    ];
}
