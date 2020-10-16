<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
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
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function show(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function edit(Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Publicaciones $publicaciones)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Publicaciones  $publicaciones
     * @return \Illuminate\Http\Response
     */
    public function destroy(Publicaciones $publicaciones)
    {
     
    }

    public function publicaciones(string $titulo, string $texto, int $persona_id){

        $insertaPublicacion = new \App\Publicaciones;
        $insertaPublicacion->titulo =$titulo;
        $insertaPublicacion->texto =$texto;
        $insertaPublicacion->persona_id =$persona_id;   
        $insertaPublicacion->save();

        return response()->json ([
            "Insertar Publicacion",
             ],201);
    }

    public function buscar(int $id=0){

        return response()->json([
            "publicacion"=> ($id == 0)? \App\Publicaciones::all():\App\Publicaciones::find($id)
            ],200);
    
    } 

    public function modificarTitulo (int $id, string $titulo){
        $modificarTitulo = \App\Publicaciones::find($id);
        $modificarTitulo->titulo = $titulo;
        $modificarTitulo->save();
        return response()->json([
                                  "Titulo Actualizado",
                                  "publicacion" => \App\Publicaciones::find($id)
                                   ],200);
}
    public function modificarTexto (int $id, string $texto){
          $modificarTexto = \App\Publicaciones::find($id);
          $modificarTexto->texto = $texto;
          $modificarTexto->save();
          return response()->json([
                                    "Texto Actualizado",
                                    "publicacion" => \App\Publicaciones::find($id)
                                   ],200);
}

public function eliminar(int $id){
            $eliminarPublicacion = \App\Publicaciones::find($id);
            $eliminarPublicacion->delete();
            return response()->json([
                                    "Publicacion Eliminada",
                                    "Publicacion" => \App\Publicaciones::all()
                    ],200);
}   
public function pubPersona(int $persona, int $publicacion = null){

    return response()->json([
                            "publicaciones realizadas"=>($publicacion == null)?\App\Publicaciones::where('persona_id', $persona)
                            ->get():\App\Publicaciones::where('persona_id', $persona)->where('id',$publicacion)->get()
                            ],200);
}
}