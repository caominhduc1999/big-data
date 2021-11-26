<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeType extends BaseModel
{
    use HasFactory;
    protected $collection = 'employee_types';

    protected $fillable = [
        '_id',
        'name',
    ];
}
