<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Carbon\Carbon;

class Carpeta extends Model
{
   protected $table = 'carpetas';

    protected $fillable = [
    	'nombre',
        'user_id',
        'estado_id',
        'dependencia_id'
    ];

    public function archivos()
    {
        return $this->hasMany(Archivo::class, 'carpeta_id', 'id');
    }

    public function estado(){
        return $this->belongsTo(Referencia::class,'estado_id','id');
    }

       public function subcarpetas(){

        $subcarpetas = DB::table('subcarpetas')
        ->join('carpetas','carpetas.id','=','subcarpetas.hija_id')
        ->where(['padre_id'=>$this->id])
        ->where('hija_id','<>',$this->id)
        //->where('carpetas.user_id',\Auth::user()->id)
        ->get();

        return $subcarpetas;
        
    }

    public function getRuta(){
        $padre = true;
        $data = [];
        $id = $this->id; 
        $data[] = [
                    'nombre'=>$this->nombre,
                    'id'=>$this->id
        ];
        $cadena = '<a class="btn_ruta" status="'.$this->estado->id.'" id="'.$this->id.'" href="/carpetas/'.$this->estado->id.'/'.$this->id.'">'.$this->nombre.'/</a>'; 
        while ($padre) {
        $parent = DB::table('subcarpetas')
        ->join('carpetas','carpetas.id','=','subcarpetas.padre_id')
        ->where('hija_id',$id)
        ->first();   
        //dd($parent);   
        
            try {
                $data[] = [
                    'nombre'=>$parent->nombre,
                    'id'=>$parent->id
                ];
            $cadena = '<a class="btn_ruta" status="'.$parent->estado_id.'" id="'.$parent->id.'" href="/carpetas/'.$parent->estado_id.'/'.$parent->id.'">'.$parent->nombre.'/</a>'.$cadena; 
              $id  = $parent->id;
             } catch (\Throwable $th) {
               $padre = false;
            }
        }
//dd($cadena);   
        return $cadena;
    }

    public function changeStatus(){
        try {
            if($this->estado->siguiente_estado!='no_aplica' and \is_numeric($this->estado->siguiente_estado)){
                $now = Carbon::now();           
                $year = $now->subYears($this->estado->duracion);
                $next_folder = DB::table('carpetas')
                ->where('estado_id',$this->estado->siguiente_estado)
                ->where('dependencia_id',\Auth::user()->dependencias[0]->id)
                ->orderBy('id','asc')
                ->first();

                $archivos = DB::table('archivos')
                ->join('carpetas','carpetas.id','=','archivos.carpeta_id')
                ->select(
                'archivos.nombre as nombre',
                'archivos.descripcion as descripcion',
                'carpetas.estado_id as estado_id',
                'archivos.created_at as fecha_creacion'
                )
              ->where('carpetas.estado_id',$this->estado_id)
                ->whereDate('archivos.fecha_cambio_estado','<=',$year) 
                //->get()   ;
               ->update(['archivos.carpeta_id'=>$next_folder->id,'archivos.fecha_cambio_estado'=>date('Y-m-d')]);

             
               // dd($this->estado->duracion);
            }
        } catch (\Throwable $th) {
            //throw $th;
        }
          
    }

}
 