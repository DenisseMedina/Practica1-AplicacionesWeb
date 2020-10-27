<?php

namespace App\Http\Controllers;

use App\Personas;
use Illuminate\Http\Request;

class PersonasController extends Controller
{
    
    public function persona(Request $request){
                        $insertaPersona = new \App\Personas;
                        $insertaPersona->nombre =$request->nombre;
                        $insertaPersona->apellidoPaterno =$request->apellidoPaterno;
                        $insertaPersona->apellidoMaterno=$request->apellidoMaterno;
                        $insertaPersona->sexo=$request->sexo;
                        $insertaPersona->edad=$request->edad;
                        $insertaPersona->save();
                        return response()->json ([
                                                "Insertar Persona"=>\App\Personas::all()
                                                ],201);
    }

    public function buscar(Request $request){
        
        return response()->json(["Request" =>$request ->all(), 
            "Personas"=>($request->$id == 0)?\App\Personas::all():\App\Personas::find($request->id)
            ],200);
    }

    public function modificarNombre (Request $request){
                    //$modificarNombre = new \App\Personas;
                    $modificarNombre = \App\Personas::find($request->id);
                    $modificarNombre->nombre =$request->nombre;
                    $modificarNombre->save();
                    return response()->json([
                                            "Nombre Actualizado"
                                            ],200);
    }
    public function modificarApellidoPaterno (Request $request){
                    $modificarApellidoPaterno = \App\Personas::find($request->id);
                    $modificarApellidoPaterno->apellidoPaterno =$request->apellidoPaterno;
                    $modificarApellidoPaterno->save();
                    return response()->json([
                                            "Apellido Paterno Actualizado"
                                            ],200);
}
    public function modificarApellidoMaterno (Request $request){
                    $modificarApellidoMaterno = \App\Personas::find($request->id);
                    $modificarApellidoMaterno->apellidoMaterno = $request->apellidoMaterno;
                    $modificarApellidoMaterno->save();
                    return response()->json([
                                            "Apellido Materno Actualizado"
                                            ],200);
}
    public function modificarEdad (Request $request){
                    $modificarEdad = \App\Personas::find($request->id);
                    $modificarEdad->edad =$request->edad;
                    $modificarEdad->save();
                    return response()->json([
                                            "Edad Actualizado"
                                            ],200);
}
    public function modificarSexo (Request $request){
                    $modificarSexo = \App\Personas::find($request->id);
                    $modificarSexo->sexo = $request->sexo;
                    $modificarSexo->save();
                    return response()->json([
                                            "Sexo Actualizado"
                                            ],200);
}
    public function eliminar(int $id){
                    $eliminarPersona = \App\Personas::find($id);
                    $eliminarPersona->delete();
                    return response()->json([
                                            "Persona Eliminada","persona" => \App\Personas::all()
                                            ],200);
    }

    
  

}
