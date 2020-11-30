<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class warehouse extends Model
{
    use HasFactory;
    protected $table = 'warehouse';
    protected $primaryKey = 'id';
    protected $fillable = ["name"];
    public $incrementing = true;
    public $timestamps = false;

    public function locate(){
        return $this->belongsToMany(locate::class, 'relplace', 'warehouse', 'locate');
    }

    public function level(){
        return $this->belongsToMany(level::class, 'relplace', 'warehouse', 'level');
    }
}
