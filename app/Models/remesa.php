<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class remesa extends Model
{
    use HasFactory;
    protected $table = 'remesa';
    protected $primaryKey = 'remesa';
    protected $fillable = [
        'dateArrive', 'dateClose', 'client_id', 'status_id', 'unitCount', 'mountTot'
    ];
    public $timestamps = false;

    public function catalogStatus(){
        return $this->belongsTo(catalogStatus::class, 'status_id', 'id');
    }

    public function clients(){
        return $this->belongsTo(client::class, 'client_id', 'id');
    }

    public function units(){
        return $this->hasMany(unit::class, 'remesa');
    }
}
