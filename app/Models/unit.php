<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class unit extends Model
{
    use HasFactory;
    protected $table = 'unit';
    protected $primaryKey = 'id';
    protected $fillable = ['idstatus', 'remesa', 'barcode', 'idproduct', 'mount'];
    public $incrementing = true;
    public $timestamps = false;
}
