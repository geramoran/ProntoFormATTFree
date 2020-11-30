<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class storage extends Model
{
    use HasFactory;
    protected $table = 'storage';
    protected $primaryKey = 'id';
    protected $fillable = ['place', 'unit'];
    public $incrementing = true;
    public $timestamps = false;
}
