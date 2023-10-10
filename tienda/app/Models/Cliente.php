<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "productos";

    protected $fillable = [
        'nombre_producto',
        'cantidad', 
        'precio'
    ];
}
