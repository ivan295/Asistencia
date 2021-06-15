<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MemoriasRam extends Model
{
    use HasFactory;
    protected $table = 'memoria_ram';
    protected $fillable = ['capacidad', 'tecnologia', 'velocidad'];
}
