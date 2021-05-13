<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'usuarios';
    
    function categoria(){
        return $this->belongsTo(Categoria::class, 'id_categoria', 'id');
    
    }

    function compra(){
        return $this->hasMany(compra::class, 'id_usuario', 'id');
    }
}
