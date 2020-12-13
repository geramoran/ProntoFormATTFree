<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;
    protected $table = 'units';
    protected $primaryKey = 'id';
    protected $fillable = ['idstatus', 'remesa', 'barcode', 'idProduct', 'mount', 'count'];
    public $incrementing = true;
    public $timestamps = false;

    public function product(){
        return $this->belongsTo(product::class, 'idProduct', 'id');
    }
}
