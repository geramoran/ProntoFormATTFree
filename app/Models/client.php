<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class client extends Model
{
    use HasFactory;
    protected $table = 'client';
    protected $primaryKey = 'id';
    protected $fillable = ['name', 'rfc', 'agent', 'address', 'zipcode', 'city', 'state', 'phone', 'email'];
    public $incrementing = true;
    public $timestamps = false;

    public function products(){
        return $this->hasMany(product::class);
    }

    public function catalogStatus(){
        return $this->hasMany(catalogStatus::class);
    }

    public function remesa(){
        return $this->hasMany(remesa::class);
    }
}
