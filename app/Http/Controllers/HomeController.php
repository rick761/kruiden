<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kruid;
use App\Foto;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kruiden = Kruid::All();
        $fotos = Foto::all();

        return view('home',[
            'fotos' => $fotos,
            'kruiden'   =>  $kruiden
        ]);
    }
    public function removeKruid(Request $request){
        Kruid::find($request->id)->delete();
        return $this->index($request);
    }
    public function addKruid(Request $request){

        $kruid = new Kruid();
        $kruid->naam = $request->naam;
        $kruid->save();

        return $this->index();
    }
}
