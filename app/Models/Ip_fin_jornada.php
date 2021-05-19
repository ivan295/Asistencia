<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip_fin_jornada extends Model
{
    use HasFactory;
    protected $table = 'ip_fin_jornada';
  	protected $fillable = ['ip','fecha', 'hora','id_reloj'];
}
