<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unitdelivery extends Model
{
    use HasFactory;
    protected $table = 'unitdelivery';
    protected $primaryKey = 'id';
    protected $fillable = [
        'unit', 'delivery', 'visitStatus', 'reason', 'visitDate', 'comment', 'isMount', 'mount', 'count'
    ];
    public $incrementing = true;
    public $timestamps = false;

}
