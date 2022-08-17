<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proyecto extends Model
{
    use HasFactory;
    protected $table = 'proyecto';
    protected $primaryKey = 'id';
    public $timestamps = false;
    protected $fillable = [
        'idparticipante',
        'modalidad',
        'sede',
        'urlvideo',
        'categoria',
        'titulo',
        'descripcion',
        'area',
        'foto',
        'activo_foto',
    ];
}
