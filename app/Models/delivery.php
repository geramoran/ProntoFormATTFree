<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class delivery extends Model
{
    use HasFactory;
    protected $table = 'deliverys';
    protected $primaryKey = 'id';
    protected $fillable = ['user', 'deliveryDate', 'areas_id'];
    public $incrementing = true;
    public $timestamps = false;

    public function user(){
        return $this->belongsTo(user::class, 'user', 'id');
    }
    public function unitdeliveries(){
        return $this->hasMany(unitdelivery::class, 'delivery', 'id');
    }
    public function area(){
        return $this->belongsTo(area::class, 'areas_id', 'id');
    }

}
