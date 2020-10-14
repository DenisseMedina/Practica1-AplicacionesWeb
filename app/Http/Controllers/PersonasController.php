<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function show(Personas $personas)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function edit(Personas $personas)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Personas $personas)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Personas  $personas
     * @return \Illuminate\Http\Response
     */
    public function destroy(Personas $personas)
    {
        //
    }
    
    public function persona(string $nombre, string $apellidoPaterno, string $apellidoMaterno, int $edad, string $sexo){
        
                                 $insertaPersona = new \App\Personas;
                                 $insertaPersona->nombre =$nombre;
                                 $insertaPersona->apellidoPaterno =$apellidoPaterno;
                                 $insertaPersona->apellidoMaterno=$apellidoMaterno;
                                 $insertaPersona->sexo=$sexo;
                                 $insertaPersona->edad=$edad;
                                 $insertaPersona->save();

                                return response()->json ([
                                                          "Insertar Persona",
                                                           ],200
    );
    }

    /*public function mostrar(Request $request, string $nombre, string $apellidoPaterno, string $apellidoMaterno, int $edad, string $sexo, int $id=0){
        
        return response()->json ([
                                 "request"=>$request->all(),
                                 "persona"=>\App\Personas::all()->toArray(),
                                 //"persona"=>\App\Personas::find($request->$id),
                                 //"persona"=>\App\Personas::find($id),
                                 "nombre"=>$nombre,
                                 "apellidoPaterno"=>$apellidoPaterno,
                                 "apellidoMaterno"=>$apellidoMaterno,
                                 "edad"=>$edad,
                                 "sexo"=>$sexo,
                                 ],200
    );
    }*/

    public function buscar(int $id=0){

        return response()->json([
                                "persona"=> ($id == 0)? \App\Personas::all():\App\Personas::find($id)
                                ],200);
    }

    public function modificarNombre (int $id, string $nombre){
                                 //$modificarNombre = new \App\Personas;
                                 $modificarNombre = \App\Personas::find($id);
                                 $modificarNombre->nombre = $nombre;
                                 $modificarNombre->save();
                                 return response()->json([
                                                           "Nombre Actualizado"
                                                            ],200);
    }
    public function modificarApellidoPaterno (int $id, string $apellidoPaterno){
                                   $modificarApellidoPaterno = \App\Personas::find($id);
                                   $modificarApellidoPaterno->apellidoPaterno = $apellidoPaterno;
                                   $modificarApellidoPaterno->save();
                                   return response()->json([
                                                             "Apellido Paterno Actualizado"
                                                            ],200);
}
    public function modificarApellidoMaterno (int $id, string $apellidoMaterno){
                                    $modificarApellidoMaterno = \App\Personas::find($id);
                                    $modificarApellidoMaterno->apellidoMaterno = $apellidoMaterno;
                                    $modificarApellidoMaterno->save();
                                    return response()->json([
                                                             "Apellido Materno Actualizado"
                                                            ],200);
}
    public function modificarEdad (int $id, string $edad){
                                    $modificarEdad = \App\Personas::find($id);
                                    $modificarEdad->edad = $edad;
                                    $modificarEdad->save();
                                    return response()->json([
                                                             "Edad Actualizado"
                                                            ],200);
}
    public function modificarSexo (int $id, string $sexo){
                                    $modificarSexo = \App\Personas::find($id);
                                    $modificarSexo->sexo = $sexo;
                                    $modificarSexo->save();
                                    return response()->json([
                                                             "Sexo Actualizado"
                                                            ],200);
}


    public function eliminar(int $id){
                                    $eliminarPersona = \App\Personas::find($id);
                                    $eliminarPersona->delete();
                                    return response()->json([
                                                              "Persona Eliminada",
                                                              "persona" => \App\Personas::all()
                                                            ],200);
    }

}
