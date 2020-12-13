<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class prontoform extends Model
{

    use HasFactory;
    protected $table = 'prontoforms';
    protected $primaryKey = 'ID';
    protected $fillable = [
        'PRONTOFORM_USER',
        'FOLIO',
        'MONTOACOBRAR',
        'SEENTREGO',
        'NOMBREDEQUIENRECIBE',
        'FOTOCONTRATO1',
        'FOTOCONTRATO2',
        'FOTOCONTRATO3',
        'FOTOCONTRATO4',
        'FOTOCONTRATO5',
        'FOTOCONTRATO6',
        'FOTOCONTRATO7',
        'FOTODEINEFRONTAL',
        'FOTOINEREVERSO',
        'FIRMA',
        'FOTODEFACHADA',
        'FECHAYHORA',
        'LOCALIZACIONGPS',
        'MOTIVODENORECIBIR',
        'HORAYFECHADEREAGENDA',
        'REFERENCENUMBER',
        'COMENTARIOS'
    ];
    public $incrementing = true;
    public $timestamps = false;
}
