<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class area extends Model
{
    use HasFactory;
    protected $table = 'areas';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'city', 'state'];
    public $incrementing = true;
    public $timestamps = false;
}
