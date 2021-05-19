<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip_inicio_descanso extends Model
{
    use HasFactory;
    protected $table = 'ip_inicio_descanso';
  	protected $fillable = ['ip','fecha', 'hora','id_reloj'];
}
