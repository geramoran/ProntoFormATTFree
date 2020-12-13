<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unitdelivery extends Model
{
    use HasFactory;
    protected $table = 'unitdeliverys';
    protected $primaryKey = 'id';
    protected $fillable = [
        'unit', 'delivery', 'visitStatus', 'reason', 'visitDate', 'comment', 'isMount', 'mount', 'count'
    ];
    public $incrementing = true;
    public $timestamps = false;

    public function unit(){
        return $this->belongsTo(unit::class, 'unit');
    }

    public function catalogStatus(){
        return $this->belongsTo(catalogStatus::class, 'visitStatus', 'id');
    }
}
