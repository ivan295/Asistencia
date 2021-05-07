<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionarios extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $fillable = ['name', 'apellido', 'cedula', 'direccion','sexo','email','password','id_tipouser','id_edificio','id_departamento'];

}
