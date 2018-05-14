<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Geneeskracht;

class testController extends Controller
{
    //
    public function removeGeneeskracht(Request $request){
        Geneeskracht::find($request->id)->delete();
        $geneeskrachten = Geneeskracht::All();
        //dd($geneeskrachten);
        return view('geneeskrachten',[
            'geneeskrachten' => $geneeskrachten
        ]);
    }
}
