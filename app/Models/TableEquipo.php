<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TableEquipo extends Model
{
    use HasFactory;
    protected $table = 'table_equipo';
  	protected $fillable = ['id_departamento','id_marca', 'almacenamiento','espacio_almacenamiento','id_modelo','id_procesador','id_memoria','id_sistemaOperativo',
                            'id_responsable','nombre_equipo','cod_cpu','estado_equipo','observacion','estado_eliminado'];
}














