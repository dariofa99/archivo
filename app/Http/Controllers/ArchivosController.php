<?php

namespace App\Http\Controllers;

use App\Referencia;
use Illuminate\Http\Request;
use Storage;
use App\Archivo;
use App\Carpeta;
use DB;
use Carbon\Carbon;
class ArchivosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request,$carpeta)
    {
        $tipos_doc = $this->getTiposDoc($request);  
        $tipos_est = $this->getTiposEstado($request);
        $carpetas = Carpeta::all();


        return view('content.archivo.index',compact('tipos_est','tipos_doc','carpeta'));
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

    private function getTiposEstado(Request $request){
        $tipos_doc = Referencia::where(['categoria'=>'tipo_estado','tabla'=>'archivos'])->paginate(5);
        return $tipos_doc;
    }

     private function getTiposDoc(Request $request){
        $tipos_doc = Referencia::where(['categoria'=>'tipo_documento','tabla'=>'archivos'])->paginate(5);
        return $tipos_doc;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         if (\Request::ajax()) {
             $archivo  = new Archivo($request->all());
            if($request->file('archivo')!=''){
                $docum = $request->file('archivo');
                $file_name= time()."_".$docum->getClientOriginalName();
                Storage::disk('files')->put($file_name, file_get_contents($docum->getRealPath() ) );              
                $nombre_original = $docum->getClientOriginalName();
                $ruta =Storage::disk('files')->url($file_name);
                $archivo->url_file = $ruta;
                $archivo->file_name = $nombre_original;
            }
            $archivo->user_id = \Auth::user()->id;
            $archivo->fecha_cambio_estado = date('Y-m-d');          
            $archivo->save();
        
        }
        return response()->json($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$status,$id)
    {
        dd('');
        $tipos_doc = $this->getTiposDoc($request);  
        $tipos_est = $this->getTiposEstado($request);
        $carpeta = Carpeta::where(['estado_id'=>$status])->first();
        try {
             $archivos = Archivo::where('carpeta_id',$carpeta->id)
                ->orderBy('created_at','desc')->paginate(6);
                $subcarpetas = $carpeta->subcarpetas();
        
        if($request->ajax()){
            $response = [
                'archivos' => view('content.archivo.index_ajax',compact('tipos_est','tipos_doc','carpeta','archivos'))->render(),
                'subcarpetas'=> view('content.archivo.partials.subcarpetas',compact('subcarpetas'))->render(),
                'ruta'=>$carpeta->getRuta(),
            ];
            return response()->json($response);
        }
        } catch (\Exception $th) {


            return $th->getMessage();
        }
      

        return view('content.archivo.index',compact('tipos_est','tipos_doc','carpeta','archivos','subcarpetas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $archivo = Archivo::find($id);
        $archivo->tipo;
        $archivo->user;
        return response()->json($archivo);
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
        $archivo = Archivo::find($id);
        $archivo->fill($request->all());
        if($request->file('archivo')!=''){
                Storage::delete($archivo->url_file);
                $docum = $request->file('archivo');
                $file_name= time()."_".$docum->getClientOriginalName();
                Storage::disk('files')->put($file_name, file_get_contents($docum->getRealPath() ) );              
                $nombre_original = $docum->getClientOriginalName();
                $ruta =Storage::disk('files')->url($file_name);
                $archivo->url_file = $ruta;
                $archivo->file_name = $nombre_original;
            }
        $archivo->save();
        
        return response()->json($archivo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $archivo = Archivo::find($id);
        $archivo->delete();
        return response()->json($archivo);
    }

    
    public function get_file($id){
     array_map('unlink', glob(public_path('act_temp/*')));//elimina los archivos que el usuario a visualizado anteriormente.(provisional)
        $archivo= Archivo::find($id);    
        $old = str_replace("\\","/",storage_path()).'/app/'.$archivo->url_file;
        copy( $old, public_path("act_temp/".$archivo->file_name));
       return redirect("act_temp/".$archivo->file_name);
    }
}
