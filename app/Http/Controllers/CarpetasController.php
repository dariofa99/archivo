<?php

namespace App\Http\Controllers;

use App\Referencia;
use Illuminate\Http\Request;
use Storage;
use App\Archivo;
use App\Carpeta;
use DB;
use Carbon\Carbon;

class CarpetasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       // return $request->all();
        $carpeta = new Carpeta($request->all());
        $carpeta->user_id = \Auth::user()->id;    
        $carpeta->dependencia_id = \Auth::user()->dependencias[0]->id; 
        $carpeta->save();   
        DB::table('subcarpetas')
        ->insert(['hija_id'=>$carpeta->id,'padre_id'=>$request->carpeta_padre_id]);   
        $carpeta = Carpeta::find($request->carpeta_padre_id);
        $subcarpetas = $carpeta->subcarpetas();
       

            return view('content.archivo.partials.subcarpetas',compact('subcarpetas'))->render();
        

        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $carpeta = Carpeta::where(['estado_id'=>$id,'dependencia_id'=>\Auth::user()->dependencias[0]->id])->first();
        try {
          
         
            $archivos = Archivo::join('carpetas','carpetas.id','=','archivos.carpeta_id')
            ->join('referencias','referencias.id','=','archivos.documento_id')
            ->join('users','users.id','=','archivos.user_id')
            ->select('archivos.nombre as nombre',
            'archivos.descripcion as descripcion',
            'archivos.file_name as file_name',
            'referencias.ref_nombre as tipo_nombre',
            'users.id as user_id',
            'archivos.id as id'
            )
            ->where('carpeta_id',$carpeta->id)
            ->search($request)
            ->orderBy('archivos.created_at','desc')->paginate(5);
             $subcarpetas = $carpeta->subcarpetas();
             $carpeta->changeStatus();
        if($request->ajax()){
            $response = [
                'archivos' => view('content.archivo.index_ajax',compact('carpeta','archivos'))->render(),
                'subcarpetas'=> view('content.archivo.partials.subcarpetas',compact('subcarpetas'))->render(),
                'ruta'=>$carpeta->getRuta(),
            ];
            return response()->json($response);
        }
        } catch (\Exception $th) {
            $carpeta = new Carpeta();
            $carpeta->estado_id = $id;
            $carpeta->nombre = 'Mis archivos';
            $carpeta->user_id = \Auth::user()->id;
            $carpeta->dependencia_id = \Auth::user()->dependencias[0]->id;
            $carpeta->save();
            return redirect('/carpetas/'.$id);
        }
      

        return view('content.archivo.index',compact('carpeta','archivos','subcarpetas'));
  
    }

     public function show_subcarpetas(Request $request,$status,$id)
    {
        if($request->ajax()){
          //  return $request->all();
        }
       
        $carpeta = Carpeta::find($id);
        try {
            $archivos = Archivo::join('carpetas','carpetas.id','=','archivos.carpeta_id')
            ->join('referencias','referencias.id','=','archivos.documento_id')
            ->join('users','users.id','=','archivos.user_id')
            ->select('archivos.nombre as nombre',
            'archivos.descripcion as descripcion',
            'archivos.file_name as file_name',
            'referencias.ref_nombre as tipo_nombre',
            'users.id as user_id',
            'archivos.id as id'
            )
            ->where('carpeta_id',$carpeta->id)
            ->search($request)
            ->orderBy('archivos.created_at','desc')->paginate(5);
                $subcarpetas = $carpeta->subcarpetas();
        
        if($request->ajax()){
            $response = [
                'archivos' => view('content.archivo.index_ajax',compact('carpeta','archivos'))->render(),
                'subcarpetas'=> view('content.archivo.partials.subcarpetas',compact('subcarpetas'))->render(),
                'ruta'=>$carpeta->getRuta(),
            ];
            return response()->json($response);
        }
        } catch (\Exception $th) {


            return $th->getMessage();
        }
      

        return view('content.archivo.index',compact('carpeta','archivos','subcarpetas'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $carpeta = Carpeta::find($id);
        $carpeta->nombre = $request->nombre;
        $carpeta->save();
        return $request->all();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $carpeta = Carpeta::find($id);
        $hay = 0;
        $subcarpetas = DB::table('subcarpetas')
            ->leftjoin('carpetas','carpetas.id','=','subcarpetas.padre_id')
            ->where('padre_id',$id)
            ->get();
          //  || count($carpeta->archivos)>0
        if(count($subcarpetas)>0 )   {
            return response()->json(['delete'=>false]);
        } 
        $carpeta->delete();
        return response()->json(['delete'=>true]);


            dd($subcarpetas);
        do { 

        $carpeta = Carpeta::find($id);
        
            $subcarpetas = DB::table('subcarpetas')
            ->leftjoin('carpetas','carpetas.id','=','subcarpetas.padre_id')
            ->where('padre_id',$id)
            ->get();

        } while (count($subcarpetas) > 0);

        

        foreach ($carpetas as $key => $carpeta) {
            $carpeta = DB::table('subcarpetas')
            ->leftjoin('carpetas','carpetas.id','=','subcarpetas.padre_id')
            ->where('padre_id',$id)
            ->get();
        }

        //$carpeta->delete();
        
        return $carpetas;
    }
}
