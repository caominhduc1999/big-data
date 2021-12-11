<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends BaseModel
{
    use HasFactory;
    protected $collection = 'exercises';

    protected $fillable = [
        '_id',
        'name',
        'description',
        'video_link'
    ];
}
