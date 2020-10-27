<?php

namespace App\Http\Controllers;

use App\Publicaciones;
use Illuminate\Http\Request;

class PublicacionesController extends Controller
{
    
    public function publicaciones(string $titulo, string $texto, int $usuario_id){

        $insertaPublicacion = new \App\Publicaciones;
        $insertaPublicacion->titulo =$titulo;
        $insertaPublicacion->texto =$texto;
        $insertaPublicacion->usaurio_id =$usuario_id;   
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
public function pubPersona(int $usaurio, int $publicacion = null){

    return response()->json([
                            "publicaciones realizadas"=>($publicacion == null)?\App\Publicaciones::where('usaurio_id', $persona)
                            ->get():\App\Publicaciones::where('usaurio_id', $usaurio)->where('id',$publicacion)->get()
                            ],200);
}

}