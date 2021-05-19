<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterStatus extends Model
{
    use HasFactory;
    protected $table = 'register_status';
    protected $fillable = ['descripcion','estado_eliminado'];
}
