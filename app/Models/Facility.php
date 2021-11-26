<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends BaseModel
{
    use HasFactory;
    protected $collection = 'facilities';

    protected $fillable = [
        '_id',
        'name',
        'count',
        'condition',
        'source',
        'warranty',
    ];
}
