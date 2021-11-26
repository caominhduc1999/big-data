<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gym_Class extends BaseModel
{
    use HasFactory;
    protected $collection = 'classes';

    protected $fillable = [
        '_id',
        'employee_id',
        'classes_name',
        'room_number',
    ];
}
