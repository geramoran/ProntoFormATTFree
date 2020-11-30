<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class product extends Model
{
    use HasFactory;
    protected $table = 'product';
    protected $primaryKey = 'id';
    protected $fillable = [
        "name", "client_id", "costoEntrega", "costoDevolucion", "Peso", "comisionEntrega", "comisionDevolucion", "tiempoCierre", "nivelServicio", "tieneCobro"
    ];
    public $incrementing = true;
    public $timestamps = false;

    public function client(){
        return $this->belongsTo(client::class);
    }
}
