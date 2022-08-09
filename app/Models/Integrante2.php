<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Integrante2 extends Model
{
    use HasFactory;
    protected $table = 'integrante2';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'nombre',
        'apellidom',
        'apellidop',
        'estado',
        'ciudad',
        'fechanacimiento',
        'sexo',
        'domicilio',
        'correo',
        'telefono',
        'ingles',
        'referencia',
        'foto',
        'activo_foto',
        'RFC',
        'CURP',
        'institucion',
    ];
}
