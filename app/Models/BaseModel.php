<?php

namespace App\Models;

use Jenssegers\Mongodb\Eloquent\Model as Model;

class BaseModel extends Model 
{
    protected $connection = 'mongodb';
}