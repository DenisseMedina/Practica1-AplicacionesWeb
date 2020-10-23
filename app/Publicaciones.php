<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Publicaciones extends Model
{
    public function usuarios(){
        return $this-> belongsTo('App/Usuarios');
    }
    public function comentarios(){
        return $this-> hasMany('App/Comentarios');
    }
   
}
