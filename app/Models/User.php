<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $table = 'users';
    public $incrementing = false;
    
    protected $fillable = [
        'user_id',
        'name',
        'password',
        'conf_pass',
        'manager_id',
        'original',
        'print',
        'es',
        'originalPath',
        'printPath',
        'esPath',
        'shooting_date',
        'a_year_later',
        'agreement_status',
        'tel_number'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];
}
