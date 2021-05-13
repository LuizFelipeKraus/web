<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Usuario;

class Categoria extends Model
{
    use HasFactory;
    protected $table = 'categoria';

    function usuarios(){
        return $this->hasMany(Usuario::class, 'id_categoria', 'id');
    }
}
