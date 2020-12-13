<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $fillable = [
        'username',
        'email',
        'create_time',
        'roles_id',
        'password',
        'prontoform_user',
        'name',
        'phone',
        'address',
        'city',
        'state',
        'zipcode'
    ];
    protected $hidden = ['password', 'token'];
    public $incrementing = true;
    public $timestamps = false;

    public function roles(){
        return $this->belongsTo(usertype::class);
    }

    public function getEmailAttribute() {
        return $this->email_addr;
    }
}
