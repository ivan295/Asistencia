<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ip_reanudacion extends Model
{
    use HasFactory;
    protected $table = 'ip_reanudacion';
  	protected $fillable = ['ip','fecha', 'hora','id_reloj'];
    
}
