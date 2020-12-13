<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class roles extends Model
{
    use HasFactory;
    protected $table = 'roles';
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'recoleccion',
        'recibo',
        'inventario',
        'despacho',
        'catalogos',
        'usuarios',
        'manifiestos',
        'reportes'
    ];
    public $incrementing = true;
    public $timestamps = false;
}
