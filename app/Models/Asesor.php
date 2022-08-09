<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use function PHPSTORM_META\map;

class Asesor extends Model
{
    use HasFactory;
    protected $table = 'asesor';
    public $timestamps = false;
    protected $primaryKey = 'id';
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
        'referencia',
        'foto',
        'RFC',
        'CURP',
        'descripcion',
        'activo_asesor'
    ];
}
