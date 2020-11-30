<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class level extends Model
{
    use HasFactory;
    protected $table = 'level';
    protected $primaryKey = 'id';
    public $incrementing = true;
    protected $fillable = ["name"];
    public $timestamps = false;

    public function locate(){
        return $this->belongsToMany(locate::class, 'relplace', 'level', 'locate');
    }

    public function warehouse(){
        return $this->belongsToMany(warehouse::class, 'relplace', 'level', 'warehouse');
    }
}
