<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class compra extends Model
{
    use HasFactory;
    protected $table = 'compra';

    function usuarios(){
        return $this->belongsTo(Usuario::class, 'id_usuario', 'id');
    
    }
}
