<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class relplace extends Model
{
    use HasFactory;
    protected $table = 'relplace';
    protected $primaryKey = 'id';
    protected $fillable = ['locate_id', 'warehouse_id', 'level_id'];
    public $incrementing = true;
    public $timestamps = false;

    public function locate(){
        return $this->belongsTo(locate::class);
    }
    public function warehouse(){
        return $this->belongsTo(warehouse::class);
    }
    public function level(){
        return $this->belongsTo(level::class);
    }
    public function relplace(){
        return $this->belongsToMany(relplace::class, 'unit');
    }
}
