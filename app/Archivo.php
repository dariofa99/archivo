<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{
    protected $table = 'archivos';

    protected $fillable = [
        'nombre',
        'codigo',
        'descripcion',
        'user_id',
        'documento_id',
        'carpeta_id',
        'url_file',
        'fecha_cambio_estado',
        'file_name'
    ];

    

    public function tipo(){
        return $this->belongsTo(Referencia::class,'documento_id','id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id','id');
    }

    public function scopeSearch($query,$request){        
        if($request->data_search){
                        return $query->Where(function($query) use($request){ 
                $query->orWhere('archivos.nombre','like','%'.$request->data_search.'%');
                $query->orWhere('archivos.descripcion','like','%'.$request->data_search.'%');
                $query->orWhere('referencias.ref_nombre','like','%'.$request->data_search.'%');
               
                });           
        }
    }

 
}
