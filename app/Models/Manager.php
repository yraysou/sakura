<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;


class Manager extends Authenticatable
{
    use Notifiable;

    protected $table = 'manager';
    protected $guarded = array('id');
    protected $primaryKey = 'manager_id';
    protected $fillable = [
        'store_name',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token'
    ];
}
