<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\Clickup as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class Clickup extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    public $incrementing = false;
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    
    protected $table = 'CLICKUP_DATA';
    protected $fillable = [
        'TASK_ID',
        'TASK_NAME',
        'REF_NUM',
        'COMPLETION',
        'PROGRESS',
        'PHASE',
        'STATUS',
        'BU',
        'TEAM',
        'START_DATE',
        'END_DATE',
        'BASE_DATE',
        'PROJECT_DOC',
        'ASIGNEE',
        'PM_BA_LEADER',
        'PIC_CIT',
        'REQUESTER',
        'SPONSOR',
        'VENDOR_OTHER',
        'BUS_FUNCTION',
        'IMPACT_FALCON',
        'IT_OT',
        'EST_BUDGET',
        'LOG_PAY_REQ',
        'RESOURCES',
        'TYPE',
        'PRIORITY',
        'REGISTER_YEAR',
        'REQ_DATE',
        'LAST_STATUS',
        'CURRENT_STATUS',
        'NEXT_STATUS',
        'MAN_DAY',
        'REQUEST_EMP_CODE',
        'KEY_ACTIVITY',
        'CREATE_DATE',

        
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        // 'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        // 'email_verified_at' => 'datetime',
        // 'username'=>'USERNAME',
        // 'password'=> 'PASSWORD',
        // 'is_admin' => 'IS_ADMIN'
        
    ];
}
