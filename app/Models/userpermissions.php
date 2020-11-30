<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userpermissions extends Model
{
    use HasFactory;
    protected $table = 'userpermissions';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
