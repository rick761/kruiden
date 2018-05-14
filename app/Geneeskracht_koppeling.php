<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geneeskracht_koppeling extends Model
{
    //
    protected $table = 'geneeskracht_koppeling';
    public $timestamps = false;

    public function Geneeskracht(){
        return $this->belongsTo('App\Geneeskracht');
    }

    public function Kruid(){
        return $this->belongsTo('App\Kruid');
    }
}
