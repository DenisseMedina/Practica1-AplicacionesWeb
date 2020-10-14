<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Personas extends Model
{
    public function publicaciones(){
        return $this-> hasMany('App/Publicaciones');
    }
    public function cometarios(){
        return $this-> hasMany('App/Comentarios');
    }
}
