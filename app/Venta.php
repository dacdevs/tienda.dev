<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Venta extends Model
{
    use SoftDeletes;
    protected $table = "ventas";

    public function cliente(){
        return $this->belongsTo(Cliente::class);
    }
}
