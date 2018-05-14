<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Kruid extends Model
{
    //
    protected $table = 'kruiden';

    public function Koppeling(){
        return $this->hasMany('App\Geneeskracht_koppeling');
    }

    public function Fotos(){
        return $this->hasMany('App\Foto');
    }

    public function displayFoto(){
     return $this->hasMany('App\Foto')->orderBy('type','desc')->first();
    }
}
