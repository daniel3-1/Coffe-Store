<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumidores extends Model
{
    use HasFactory;

    protected $table = "consumidores";

    protected $fillable = [
        "nombre", 
        "email"
    ];
}
