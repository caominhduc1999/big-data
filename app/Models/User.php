<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Jenssegers\Mongodb\Auth\User as Authenticatable;

class User extends Authenticatable
{
    public const ADMIN_ROLE = 0;
    public const USER_ROLE = 1;

    public const ROLES = [
        0 => 'ADMIN',
        1 => 'USER'
    ];

    public const GENDERS = [
        0 => 'Male',
        1 => 'Female'
    ];

    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        '_id',
        'name',
        'email',
        'password',
        'role',
        'name',
        'birthday',
        'address',
        'phone',
        'gender',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
