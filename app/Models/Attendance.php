<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

class Attendance extends BaseModel
{
    use HasFactory;

    protected $table = "attendance";

    protected $fillable = [
        '_id',
        'user_id',
        'updated_at'
    ];
}
