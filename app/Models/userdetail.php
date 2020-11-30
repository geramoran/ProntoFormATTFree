<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class userdetail extends Model
{
    use HasFactory;
    protected $table = 'userdetail';
    protected $primaryKey = 'id';
    public $incrementing = true;
    public $timestamps = false;
}
