<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kruid;

class kruidVisitorController extends Controller
{
    //

    public function index(Request $request){
        $kruid = Kruid::Find($request->id);
        return view('kruid_visitor',[
                'kruid'   =>  $kruid
            ]);
    }
}
