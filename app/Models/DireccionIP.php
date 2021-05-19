<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DireccionIP extends Model
{
    use HasFactory;
    protected $table = 'tableip';
  	protected $fillable = ['ip','observacion', 'estado_eliminado','id_edificio'];
}
