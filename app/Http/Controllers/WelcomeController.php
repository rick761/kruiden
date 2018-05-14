<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kruid;
use App\Geneeskracht;
use App\Geneeskracht_koppeling;
use App\Foto;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $geneeskracht = Geneeskracht::All();
        $kruiden = Kruid::All();



        return view('welcome',[

            'geneeskracht'  =>  $geneeskracht,
            'kruiden'   =>  $kruiden

        ]);
    }
    public function search(Request $request){
        $zoekterm = $request->q;
        $kruid = Kruid::where('naam','LIKE','%'.$zoekterm.'%')->get();
        if(count($kruid) > 0){
            return view('welcome',[
                'geneeskracht'  =>  Geneeskracht::All(),
                'kruiden'   =>  $kruid
            ]);
        } else {
            return view('welcome',[
                'geneeskracht'  =>  Geneeskracht::All(),
                'kruiden'   =>  Kruid::All()
            ]);
        }


    }
    public function searchGeneeskracht(Request $request){

        $zoekterm = $request->q;
        $kruiden = Kruid::All();

        foreach($kruiden as $key => $kruid) {
            $kruid->Koppeling;
            $found_key = false;
            foreach($kruid->Koppeling as $koppeling){

                if($koppeling->geneeskracht_id == $zoekterm){
                    $found_key = true;
                }
            }
            if ($found_key == false){ $kruiden->forget($key); }
        }

        if(count($kruiden) > 0){
            return view('welcome',[
                'geneeskracht'  =>  Geneeskracht::All(),
                'kruiden'   =>  $kruiden
            ]);
        } else {
            return view('welcome',[
                'geneeskracht'  =>  Geneeskracht::All(),
                'kruiden'   =>  Kruid::All()
            ]);
        }

    }
}
