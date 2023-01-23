<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Referencia;

class ReferenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexTipo(Request $request)
    {
        $tipos_doc = $this->getTiposDoc($request);
        if($request->ajax()){
         //   return 'hola';
             return view('content.referencias.tipo_documento.index_ajax',compact('tipos_doc'))->render();
        }
        return view('content.referencias.tipo_documento.index',compact('tipos_doc'));
    }

    private function getTiposDoc(Request $request){
        $tipos_doc = Referencia::where(['categoria'=>'tipo_documento','tabla'=>'archivos'])->paginate(5);
        return $tipos_doc;
    }


    public function indexEstado(Request $request)
    {
         $tipos_est = $this->getTiposEstado($request);
         
         if($request->ajax()){
         //   return 'hola';
             return view('content.referencias.tipo_estado.index_ajax',compact('tipos_est'))->render();
        }
        return view('content.referencias.tipo_estado.index',compact('tipos_est'));
    }

    private function getTiposEstado(Request $request){
        $tipos_doc = Referencia::where(['categoria'=>'tipo_estado','tabla'=>'archivos'])->paginate(5);
        return $tipos_doc;
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
    public function storeTipo(Request $request)
    {
       // return response()->json($request->all());
        $referencia =  new Referencia($request->all());
        $referencia->save();
        return response()->json($request->all());
    }

    /* public function storeTipo(Request $request)
    {
        $referencia =  new Referencia($request->all());
        $referencia->save();
        return response()->json($request->all());
    } */

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $referencia = Referencia::find($id);
               
        
        return response()->json($referencia);
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
      //  return response()->json($request->all());
        $referencia = Referencia::find($id);
        $referencia->fill($request->all());
        $referencia->save();
        
        return response()->json($referencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $referencia = Referencia::find($id);
        $referencia->delete();
        
        return response()->json($referencia);
    }
}
