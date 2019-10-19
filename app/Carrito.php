<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Carrito extends Model
{
    protected $table = "producto_cliente";
    public $timestamps = false;

    public function producto(){
        return $this->belongsTo(Producto::class);
    }
}
