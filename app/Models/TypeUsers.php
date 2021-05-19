<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TypeUsers extends Model
{
    use HasFactory;
    protected $table = 'type_users';
  	protected $fillable = ['descripcion', 'estado_eliminado'];

}
