<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class user extends Authenticatable
{
    use HasFactory, Notifiable;
    protected $table = 'user';
    protected $primaryKey = 'id';
    protected $fillable = ['username', 'email', 'password', 'create_time', 'usertype_id'];
    protected $hidden = ['password', 'token'];
    public $incrementing = true;
    public $timestamps = false;

    public function client(){
        return $this->belongsTo(usertype::class);
    }

    public function getEmailAttribute() {
        return $this->email_addr;
    }
}
