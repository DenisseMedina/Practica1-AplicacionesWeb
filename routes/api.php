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
Route::get('/persona/registro','PersonasController@persona')->middleware('verificar.edad');

//BuscarPersonas
Route::get('/persona/buscar', 'PersonasController@buscar')
    ->where(['id'=>'[0-9]+']);
     
//ActualizarCampos
Route::put('/modificar/nombre','PersonasController@modificarNombre');
Route::put('/modificar/apellidopaterno','PersonasController@modificarApellidoPaterno');
Route::put('/modificar/apellidomaterno','PersonasController@modificarApellidoMaterno');
Route::put('/modificar/edad','PersonasController@modificarEdad');
Route::put('/modificar/sexo','PersonasController@modificarSexo');

//EliminarCampos
Route::delete('/personas/{id?}', 'PersonasController@eliminar')
    ->where(['id'=>'[0-9]+']);

//PUBLICACIONES
//InsertarPublicaciones
Route::post('/publicacion/{titulo?}/{texto?}/{persona_id?}/','PublicacionesController@publicaciones')
   ->where(
    ['titulo'=>'[a-zA-Z]+',
    'texto'=>'[a-zA-Z]+',
    'persona_id'=>'[0-9]+',
    ]);

//BuscarPublicaciones
Route::get('/publicaciones/{id?}', 'PublicacionesController@buscar')
    ->where(['id','[0-9]+']);

//ActualizarPublicaciones
Route::put('/actualizar/publicacion/{id?}/titulo/{titulo}', 'PublicacionesController@modificarTitulo')
    ->where(['id'=>'[0-9]+',
    'titulo'=>'[a-zA-Z]+',]);

Route::put('/actualizar/publicacion/{id?}/texto/{texto}', 'PublicacionesController@modificarTexto')
    ->where(['id'=>'[0-9]+',
    'texto'=>'[a-zA-Z]+',]);

//EliminarPublicaciones
Route::delete('/eliminar/publicaciones/{id}', 'PublicacionesController@eliminar')
    ->where(['id'=>'[0-9]+']);
    
//COMENTARIOS
//InsertarComentarios
Route::get('/comentarios/{comentario?}/{persona_id?}/{publicacion_id?}','ComentariosController@comentarios')
   ->where(
    ['comentario'=>'[a-zA-Z]+',
    'persona_id'=>'[0-9]+',
    'publicacion_id'=>'[0-9]+',
    ]);
 
//BuscarComentarios
Route::get('/buscar/{id?}', 'ComentariosController@buscar')
    ->where(['id','[0-9]+']);

//ActualizarComentario
Route::put('/actualizar/{id?}/comentario/{comentario}', 'ComentariosController@modificar')
    ->where(['id'=>'[0-9]+',
    'texto'=>'[a-zA-Z]+',]);

//EliminarPublicaciones
Route::delete('/eliminar/comentarios/{id}', 'ComentariosController@eliminar')
    ->where(['id'=>'[0-9]+']);


//CONSULTAS    
//Buscar determinada persona con determinada Publicacion/ Buscar todas las publicaciones de una persona 
Route::get('/buscar/persona/{persona}/publicacion/{publicacion?}','PublicacionesController@pubPersona')
    ->where(
    ['persona' => '[0-9]+',
     'publicacion' =>'[0-9]+'
    ]);

//Buscar determinada publicacion con determinas comentario / Buscar todos los comentarios de una Determinada Publicacion
Route::get('comentarios/{publicacion_id}/publicacion/{id?}','ComentariosController@comentarioPublicacion')
->where( ['id'=>'[0-9]+','
      pub_id'=>'[0-9]+']);

//Buscar determinada persona con determinado comentario / Buscar todos los comentarios de una Determinada Persona       
Route::get('comentarios/{persona_id}/persona/{id?}','ComentariosController@comentarioPersona')
->where( ['id'=>'[0-9]+','
         persona_id'=>'[0-9]+']);

//Buscar toda la base de datos
Route::get('personas/publicaciones/comentarios','ComentariosController@todaBaseDatos');

//Buscar determinado comentarios de determinada publicacion de determinda persona
Route::get('/persona/{persona_id}/publicaciones/{publicacion_id}/comentarios/{id?}','ComentariosController@comentarioPublicacionPersona')
->where( ['id'=>'[0-9]+',
'persona_id'=>'[0-9]+',
'publicacion_id'=>'[0-9]+']);

//Mostrar todas las personas
Route::get('/administradores/panel','RolesController@mostrarPersonas')->middleware('permisos.admin') ;