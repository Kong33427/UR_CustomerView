<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'WEBAPP2_USERS';
    protected $fillable = [
        'USERNAME',
        'PASSWORD',
    ];
    protected $hidden = [
        'PASSWORD',
        // 'remember_token',
    ];
}
