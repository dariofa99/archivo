<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Dependencia;

class DependenciasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $dependencias = Dependencia::paginate(5);
        if($request->ajax()){
            return view('content.dependencias.index_ajax',compact('dependencias'))->render();
        }

        return view('content.dependencias.index',compact('dependencias'));
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
        $dependencia = new Dependencia($request->all());
        $dependencia->save();

        return response()->json($dependencia);
    }

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
        $dependencia = Dependencia::find($id);
        return response()->json($dependencia);
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
        $dependencia = Dependencia::find($id);
        $dependencia->fill($request->all());
        $dependencia->save();
        return response()->json($dependencia);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dependencia = Dependencia::find($id);
        $dependencia->delete();
        return response()->json($dependencia);
    }
}
