<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
   
//InsertaPersona
//Route::get('/persona/registro','PersonasController@persona')->middleware('verificar.edad');

//BuscarPersonas
//Route::get('/persona/buscar', 'PersonasController@buscar')->where(['id'=>'[0-9]+']);

//ActualizarCampos
/*Route::put('/modificar/nombre','PersonasController@modificarNombre');
Route::put('/modificar/apellidopaterno','PersonasController@modificarApellidoPaterno');
Route::put('/modificar/apellidomaterno','PersonasController@modificarApellidoMaterno');
Route::put('/modificar/edad','PersonasController@modificarEdad');
Route::put('/modificar/sexo','PersonasController@modificarSexo');*/

//EliminarCampos
/*Route::delete('/personas/{id?}', 'PersonasController@eliminar')->where(['id'=>'[0-9]+']);*/

//PUBLICACIONES
//InsertarPublicaciones
/*Route::post('/publicacion/{titulo?}/{texto?}/{persona_id?}/','PublicacionesController@publicaciones')
->where(['titulo'=>'[a-zA-Z]+','texto'=>'[a-zA-Z]+','persona_id'=>'[0-9]+',]);*/

//BuscarPublicaciones
/*Route::get('/publicaciones/{id?}', 'PublicacionesController@buscar')->where(['id','[0-9]+']);*/

//ActualizarPublicaciones
/*Route::put('/actualizar/publicacion/{id?}/titulo/{titulo}', 'PublicacionesController@modificarTitulo')
->where(['id'=>'[0-9]+','titulo'=>'[a-zA-Z]+',]);

Route::put('/actualizar/publicacion/{id?}/texto/{texto}', 'PublicacionesController@modificarTexto')
->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);

//EliminarPublicaciones
Route::delete('/eliminar/publicaciones/{id}', 'PublicacionesController@eliminar')->where(['id'=>'[0-9]+']);*/
    
//COMENTARIOS
//InsertarComentarios
/*Route::get('/comentarios/{comentario?}/{persona_id?}/{publicacion_id?}','ComentariosController@comentarios')
   ->where(['comentario'=>'[a-zA-Z]+','persona_id'=>'[0-9]+','publicacion_id'=>'[0-9]+',]);
 
//BuscarComentarios
Route::get('/buscar/{id?}', 'ComentariosController@buscar')->where(['id','[0-9]+']);

//ActualizarComentario
Route::put('/actualizar/{id?}/comentario/{comentario}', 'ComentariosController@modificar')->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);

//EliminarComentarios
Route::delete('/eliminar/comentarios/{id}', 'ComentariosController@eliminar')->where(['id'=>'[0-9]+']);*/

//CONSULTAS    
//Buscar determinada persona con determinada Publicacion/ Buscar todas las publicaciones de una persona 
Route::get('/buscar/persona/{persona}/publicacion/{publicacion?}','PublicacionesController@pubPersona')
    ->where(['persona' => '[0-9]+','publicacion' =>'[0-9]+']);

//Buscar determinada publicacion con determinas comentario / Buscar todos los comentarios de una Determinada Publicacion
Route::get('comentarios/{publicacion_id}/publicacion/{id?}','ComentariosController@comentarioPublicacion')
->where( ['id'=>'[0-9]+','pub_id'=>'[0-9]+']);

//Buscar determinada persona con determinado comentario / Buscar todos los comentarios de una Determinada Persona       
Route::get('comentarios/{persona_id}/persona/{id?}','ComentariosController@comentarioPersona')
->where( ['id'=>'[0-9]+','persona_id'=>'[0-9]+']);

//Buscar determinado comentarios de determinada publicacion de determinda persona
Route::get('/persona/{persona_id}/publicaciones/{publicacion_id}/comentarios/{id?}','ComentariosController@comentarioPublicacionPersona')
->where( ['id'=>'[0-9]+','persona_id'=>'[0-9]+','publicacion_id'=>'[0-9]+']);

//BuscarUsuarios
//Route::middleware('auth:sanctum','verificar.rol')->get('/mostrar/usuarios', 'UsuariosController@mostrar');
//AutorizarPermisos
//Route::post('permisos', 'AutentificacionesController@darPermisos');
//Buscar toda la base de datos
//Route::get('personas/publicaciones/comentarios','ComentariosController@todaBaseDatos');

Route::middleware(['auth:sanctum', 'verificar.rol'])->group(function (){
Route::get('/persona/buscar', 'PersonasController@buscar');
Route::delete('/personas/eliminar', 'PersonasController@eliminar');

Route::post('permisos', 'AutentificacionesController@darPermisos');
Route::get('/mostrar/usuarios', 'UsuariosController@mostrar');

//Buscar toda la base de datos
Route::get('personas/publicaciones/comentarios','ComentariosController@todaBaseDatos');

//PUBLICACIONES
Route::post('/publicacion/{titulo?}/{texto?}/{persona_id?}/','PublicacionesController@publicaciones')
->where(['titulo'=>'[a-zA-Z]+', 'texto'=>'[a-zA-Z]+','persona_id'=>'[0-9]+',]);
Route::get('/publicaciones/{id?}', 'PublicacionesController@buscar')
->where(['id','[0-9]+']);
//ActualizarPublicaciones
Route::put('/actualizar/publicacion/{id?}/titulo/{titulo}', 'PublicacionesController@modificarTitulo')
->where(['id'=>'[0-9]+','titulo'=>'[a-zA-Z]+',]);
Route::put('/actualizar/publicacion/{id?}/texto/{texto}', 'PublicacionesController@modificarTexto')
->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);
//EliminarPublicaciones
Route::delete('/eliminar/publicaciones/{id}', 'PublicacionesController@eliminar')->where(['id'=>'[0-9]+']);

//COMENTARIOS
//InsertarComentarios
Route::get('/comentarios/{comentario?}/{persona_id?}/{publicacion_id?}','ComentariosController@comentarios')
->where(['comentario'=>'[a-zA-Z]+','persona_id'=>'[0-9]+','publicacion_id'=>'[0-9]+',]);
 //BuscarComentarios
Route::get('/buscar/{id?}', 'ComentariosController@buscar')->where(['id','[0-9]+']);
//ActualizarComentario
Route::put('/actualizar/{id?}/comentario/{comentario}', 'ComentariosController@modificar')->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);
//EliminarComentarios
Route::delete('/eliminar/comentarios/{id}', 'ComentariosController@eliminar')->where(['id'=>'[0-9]+']);
});

/*Route::middleware(['auth:sanctum', 'verificar.usuario'])->group(function () {
    
//PUBLICACIONES
//ActualizarPublicaciones
Route::put('/actualizar/publicacion/{id?}/titulo/{titulo}', 'PublicacionesController@modificarTitulo')
->where(['id'=>'[0-9]+','titulo'=>'[a-zA-Z]+',]);
Route::put('/actualizar/publicacion/{id?}/texto/{texto}', 'PublicacionesController@modificarTexto')
->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);
//EliminarPublicaciones
Route::delete('/eliminar/publicaciones/{id}', 'PublicacionesController@eliminar')->where(['id'=>'[0-9]+']);

//COMENTARIOS
//InsertarComentarios
Route::get('/comentarios/{comentario?}/{persona_id?}/{publicacion_id?}','ComentariosController@comentarios')
->where(['comentario'=>'[a-zA-Z]+','persona_id'=>'[0-9]+','publicacion_id'=>'[0-9]+',]);
 //BuscarComentarios
Route::get('/buscar/{id?}', 'ComentariosController@buscar')->where(['id','[0-9]+']);
//ActualizarComentario
Route::put('/actualizar/{id?}/comentario/{comentario}', 'ComentariosController@modificar')->where(['id'=>'[0-9]+','texto'=>'[a-zA-Z]+',]);
//EliminarComentarios
Route::delete('/eliminar/comentarios/{id}', 'ComentariosController@eliminar')->where(['id'=>'[0-9]+']);

});*/

Route::post('registro', 'AutentificacionesController@registro');
Route::post('login', 'AutentificacionesController@logIn');

Route::middleware('auth:sanctum')->get('usuario','AutentificacionesController@inicio');
Route::middleware('auth:sanctum')->delete('salir','AutentificacionesController@salir');

Route::middleware(['auth:sanctum'])->group(function () {
Route::get('/persona/registro','PersonasController@persona')->middleware('verificar.edad');
Route::put('/modificar/nombre','PersonasController@modificarNombre');
Route::put('/modificar/apellidopaterno','PersonasController@modificarApellidoPaterno');
Route::put('/modificar/apellidomaterno','PersonasController@modificarApellidoMaterno');
Route::put('/modificar/edad','PersonasController@modificarEdad');
Route::put('/modificar/sexo','PersonasController@modificarSexo');

    //Route::get('usuario','AutentificacionesController@inicio');
    //Route::delete('salir','AutentificacionesController@salir');
});

//Mostrar todas las personas
Route::get('/administradores/panel','RolesController@mostrarPersonas')->middleware('permisos.admin') ;


