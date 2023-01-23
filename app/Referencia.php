<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referencia extends Model
{
    protected $table = 'referencias';

    protected $fillable = [
    	'ref_nombre',
        'descripcion',
        'tabla',
        'categoria',
        'duracion',
        'siguiente_estado'
    ];
}
