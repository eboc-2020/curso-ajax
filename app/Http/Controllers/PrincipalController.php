<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PrincipalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        /* $datos = \DB::table('t1preliminares110.vehiculo_preliminar_pruebas')->paginate(15); */
        $datos ='';

        return view('curso.index',compact('datos'));
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
        //
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
        $editar = \DB::table('t1preliminares110.vehiculo_preliminar_pruebas')->where('id_vehiculo_preliminar',$id)->paginate(15);
        
        return view('curso.edit',compact('editar'));
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        
        $editar = DB::table('t1preliminares110.vehiculo_preliminar_pruebas')
        ->select('*')
        ->where('id_vehiculo_preliminar',$request->id)
        ->update([
            'no_placa' => $request->placa,
            'fecha_robo' => $request->fecha,
            'no_chasis' => $request->chasis
        ]);

        $query = DB::table('t1preliminares110.vehiculo_preliminar_pruebas')
        ->select('*')
        ->where('id_vehiculo_preliminar',$request->id)
        ->get();
        return $query;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
