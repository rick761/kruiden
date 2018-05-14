<?php

namespace App\Http\Controllers;

use App\Geneeskracht;
use Illuminate\Http\Request;

class GeneeskrachtenController extends Controller
{
    public function removeGeneeskracht(Request $request){
        Geneeskracht::find($request->id)->delete();
        return $this->index($request);
    }
    //
    public function index(Request $request ){
        $geneeskrachten = Geneeskracht::All();
        //dd($geneeskrachten);
        return view('geneeskrachten',[
            'geneeskrachten' => $geneeskrachten
        ]);
    }
}
