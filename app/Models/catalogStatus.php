<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class catalogStatus extends Model
{
    use HasFactory;
    protected $table = 'catalogstatus';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'type', 'client_id'];
    public $incrementing = true;
    public $timestamps = false;

}
