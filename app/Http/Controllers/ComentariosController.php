<?php

namespace App\Http\Controllers;

use App\Comentarios;
use Illuminate\Http\Request;

class ComentariosController extends Controller
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
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function show(Comentarios $comentarios)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function edit(Comentarios $comentarios)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comentarios $comentarios)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comentarios  $comentarios
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comentarios $comentarios)
    {
        //
    }
    public function comentarios(string $comentario, string $persona_id, int $publicacion_id){

        $insertaComentario = new \App\Comentarios;
        $insertaComentario->comentario =$comentario;
        $insertaComentario->persona_id =$persona_id;
        $insertaComentario->publicacion_id =$publicacion_id;   
        $insertaComentario->save();

        return response()->json ([
            "Insertar Comentario",
        ],200);
    }

    public function buscar(int $id=0){

        return response()->json([
            "comentario"=> ($id == 0)? \App\Comentarios::all():\App\Comentarios::find($id)
            ],200);
    
    } 

    public function modificarComentario (int $id, string $comentario){
        $modificarComentario = \App\Comentarios::find($id);
        $modificarComentario->comentario = $comentario;
        $modificarComentario->save();
        return response()->json([
                                  "comentario actualizado",
                                   ],200);
}

    public function eliminar(int $id){
        $eliminarComentario = \App\Comentarios::find($id);
        $eliminarComentario->delete();
        return response()->json([
                                "comentario eliminado",
                                "comentario" => \App\Comentarios::all()
                                ],200);
}
    public function comentarioPublicacion( int $pub_id, int $id ){
         return response()->json([
        'publicaciones'=>( $id==null)? 
        Comentarios::where('publicacion_id', $pub_id)->get():
        Comentarios::where('publicacion_id', $pub_id)->where('id',$id)->get()
    ],200);
}
    public function comentarioPersona(int $persona_id,int $id ){
        return response()->json([
        'persona'=>( $id==null)? 
        Comentarios::where('persona_id', $persona_id)->get():
        Comentarios::where('persona_id', $persona_id)->where('id',$id)->get()
    ],200);
}
} 
