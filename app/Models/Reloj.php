<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reloj extends Model
{
    use HasFactory;
    protected $table = 'reloj';
  	protected $fillable = ['fecha', 'hora_ingreso', 'id_modalidad_ingreso', 'hora_descanso','hora_reanudacion','id_modalidad_reanudacion','hora_salida','estado','ip','id_user'];

}
