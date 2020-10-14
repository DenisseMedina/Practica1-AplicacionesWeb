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

//MostarPersona
Route::post('/mostrar/{nombre?}/{apellidoPaterno?}/{apellidoMaterno?}/{edad?}/{sexo?}/{id}','PersonasController@mostrar')
    ->where(
    ['nombre'=>'[a-zA-Z]+',
    'apellidoPaterno'=>'[a-zA-Z]+',
    'apellidoMaterno'=>'[a-zA-Z]+',
    'sexo'=>'[a-zA-Z]+',
    'edad'=>'[0-9]+',
    'id'=>'[0-9]+',
    ]);

//RegistarPersona
Route::post('/persona/{nombre?}/{apellidoPaterno?}/{apellidoMaterno?}/{edad?}/{sexo?}','PersonasController@persona')
   ->where(
    ['nombre'=>'[a-zA-Z]+',
    'apellidoPaterno'=>'[a-zA-Z]+',
    'apellidoMaterno'=>'[a-zA-Z]+',
    'sexo'=>'[a-zA-Z]+',
    'edad'=>'[0-9]+',
    ]);

//BuscarPersona
Route::post('/buscar/{id?}', 'PersonasController@buscar')
    ->where(['id','[0-9]+']);

//ActualizarCampos
Route::put('/modificar/{id?}/nombre/{nombre}', 'PersonasController@modificarNombre')
    ->where(['id'=>'[0-9]+',
    'nombre'=>'[a-zA-Z]+',]);

Route::put('/modificar/{id?}/apellidoPaterno/{apellidoPaterno}', 'PersonasController@modificarApellidoPaterno')
    ->where(['id'=>'[0-9]+',
    'nombre'=>'[a-zA-Z]+',]);

Route::put('/modificar/{id?}/apellidoMaterno/{apellioMaterno}', 'PersonasController@modificarApellidoMaterno')
    ->where(['id'=>'[0-9]+',
    'nombre'=>'[a-zA-Z]+',]);

Route::put('/modificar/{id?}/edad/{edad}', 'PersonasController@modificarEdad')
    ->where(['id'=>'[0-9]+',
    'edad'=>'[0-9]+',]);

Route::put('/modificar/{id?}/sexo/{sexo}', 'PersonasController@modificarSexo')
    ->where(['id'=>'[0-9]+',
    'sexo'=>'[a-zA-Z]+',]);

//EliminarCampos
Route::delete('/eliminar/{id?}', 'PersonasController@eliminar')
    ->where(['id'=>'[0-9]+']);

//InsertarPublicaciones
Route::post('/publicacion/{titulo?}/{texto?}/{persona_id?}/','PublicacionesController@publicaciones')
   ->where(
    ['titulo'=>'[a-zA-Z]+',
    'texto'=>'[a-zA-Z]+',
    'persona_id'=>'[0-9]+',
    ]);
//BuscarPublicaciones
Route::post('/buscar/{id?}', 'PublicacionesController@buscar')
    ->where(['id','[0-9]+']);
Route::get('/buscar/persona/{persona?}/publicacion/{publicacion?}','PublicacionesController@pubPersona')
    ->where(
    ['persona' => '[0-9]+',
     'publicacion' =>'[0-9]+'
    ]);

//ActualizarPublicaciones
Route::put('/actualizar/publicacion/{id?}/titulo/{titulo}', 'PublicacionesController@modificarTitulo')
    ->where(['id'=>'[0-9]+',
    'titulo'=>'[a-zA-Z]+',]);

Route::put('/actualizar/publicacion/{id?}/texto/{texto}', 'PublicacionesController@modificarTexto')
    ->where(['id'=>'[0-9]+',
    'texto'=>'[a-zA-Z]+',]);

//EliminarPublicaciones
Route::delete('/eliminar/publicacion/{id}', 'PublicacionesController@eliminar')
    ->where(['id'=>'[0-9]+']);

//InsertarComentarios
Route::post('/comentarios/{comentario?}/{persona_id?}/{publicacion_id?}','ComentariosController@comentarios')
   ->where(
    ['comentario'=>'[a-zA-Z]+',
    'persona_id'=>'[0-9]+',
    'publicacion_id'=>'[0-9]+',
    ]);

//BuscarComentarios
Route::post('/buscar/{id?}', 'ComentariosController@buscar')
    ->where(['id','[0-9]+']);

Route::get('comentarios/publicacion/{publicacion_id}/{id?}','ComentariosController@comentarioPublicacion')
    ->where( ['id'=>'[0-9]+','
          pub_id'=>'[0-9]+']);
    
 Route::get('comentarios/persona/{persona_id}/{id?}','ComentariosController@comentarioPersona')
    ->where( ['id'=>'[0-9]+','
             persona_id'=>'[0-9]+']);

//ActualizarComentario
Route::put('/actualizar/{id?}/comentario/{comentario}', 'ComentariosController@modificarComentario')
    ->where(['id'=>'[0-9]+',
    'texto'=>'[a-zA-Z]+',]);

//EliminarPublicaciones
Route::delete('/eliminar/comentarios/{id}', 'ComentariosController@eliminar')
    ->where(['id'=>'[0-9]+']);




