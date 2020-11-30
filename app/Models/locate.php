<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class locate extends Model
{
    use HasFactory;
    protected $table = 'locate';
    protected $primaryKey = 'id';
    protected $fillable = ["name"];
    public $incrementing = true;
    public $timestamps = false;

    public function level(){
        return $this->belongsToMany(level::class, 'relplace');
    }

    public function warehouse(){
        return $this->belongsToMany(warehouse::class, 'relplace');
    }
}
