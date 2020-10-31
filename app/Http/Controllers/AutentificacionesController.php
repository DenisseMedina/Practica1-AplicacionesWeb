<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Usuarios;
use Illuminate\Validation\ValidationException;

class AutentificacionesController extends Controller
{
    public function registro(Request $request) {

        $request->validate([
            'email'=> 'required|email',
            'password' =>'required',
        ]); 

        $usuario = new Usuarios();
        $usuario->persona_id=$request->persona_id;
        $usuario->rol_id=$request->rol_id;
        $usuario->email=$request->email;
        $usuario->password= Hash::make($request->password);

        if($usuario->save())
        return response()->json($usuario,201);
        return abort(400,"No se puede Registar, Intentelo Nuevamente");
    }

    public function logIn(Request $request){
        $request->validate([
            'email'=> 'required|email',
            'password'=>'required',
        ]);

        $usuario = Usuarios::where('email', $request->email)->first();

        if(! $usuario || ! Hash::check($request->password, $usuario->password))
        {
            throw ValidationException::withMessages([
                'email' => ['Datos Incorrectos']
            ]);
        }
        if($usuario->rol_id==1){
            $token = $usuario->createToken($request->email,['UsuarioComun'])->plainTextToken;
        }
        elseif($usuario->rol_id==2){
            $token = $usuario->createToken($request->email,['Administador'])->plainTextToken;
        }
        return response()->json(["token"=>$token],201);
    }

    public function salir(Request $request){
        return response()->json(["Eliminados"=>$request->user()->tokens()->delete()],200);
    }

    public function inicio(Request $request){
        if($request->user()-> tokenCan('UsuarioComun'))
        {
            return response()->json(["Perfil de Usuario"=>$request->user()],200);
        }
        elseif($request->user()-> tokenCan('Administrador'))
        {
            return response()->json(["Perfil de Administador"=>$request->user()],200);
        }
        return abort(401,"Invalido");
    } 

    public function darPermisos(Request $request)
    {
    $usuario=usuarios::find($request->id);
    $usuario->rol_id=2;
    $token =$usuario->createToken($usuario->email,['Administrador']);
    if($usuario->save()){
        return response()->json(["Cambios Realizados"=>usuarios::find($request->id),
                                 "Nuevo token"=>$token],200);
    }
}
}
