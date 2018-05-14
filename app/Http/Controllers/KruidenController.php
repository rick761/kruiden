<?php

namespace App\Http\Controllers;

use App\Geneeskracht;
use Illuminate\Http\Request;
use App\Kruid;
use App\Geneeskracht_koppeling;
use App\Foto;
use Intervention\Image\ImageManager;
use Image;



class KruidenController extends Controller
{
    //
    public function removeFoto(Request $request){
        $foto = Foto::find($request->foto_id);
        \File::delete(asset('images/'.$foto->url));
        $foto->delete();
        return $this->index($request);
    }

    public function veranderFotoType(Request $request){
        var_dump($request->all());
        $foto = Foto::find($request->foto_id);
        $foto->type = $request->type;
        $foto->save();
        return $this->index($request);
    }

    public function addFoto(Request $request){
        //

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg',
        ]);
        $manager = new ImageManager(array('driver' => 'gd'));
        $image = $request->file('image');
        $filename = time().'.'.$image->getClientOriginalExtension();
        $path= public_path('/images/'.$filename);
        $image = Image::make($image->getRealPath())->resize(400, 300)->save($path);

        $foto = new Foto();
        $foto->type = $request->type;
        $foto->url = $filename;
        $foto->kruid_id = $request->id;
        $foto->save();

        return $this->index($request);
    }

    public function insertGeneeskrachtBestaand(Request $request){
        $gevonden_geneeskracht = Geneeskracht::where('naam', $request->geneeskracht)->first();
        $koppeling = new Geneeskracht_koppeling();
        $koppeling->kruid_id = $request->id;
        $koppeling->geneeskracht_id = $gevonden_geneeskracht->id;
        $koppeling->save();
        return $this->index($request);
    }

    public function insertGeneeskracht(Request $request){
        if($request->naam != null){
            if(Geneeskracht::where('naam', $request->naam)->get()->count() == 0){
                $new_geneeskracht = new Geneeskracht();
                $new_geneeskracht->naam = $request->naam;
                $new_geneeskracht->save();
                $new_koppeling = new Geneeskracht_koppeling();
                $new_koppeling->kruid_id = $request->id;
                $new_koppeling->geneeskracht_id = $new_geneeskracht->id;
                $new_koppeling->save();
            }
        }
        return $this->index($request);
    }
    public function removeKoppeling(Request $request){
        //dd($request->all());
        Geneeskracht_koppeling::find($request->koppel_id)->delete();
        return $this->index($request);
    }
    public function index(Request $request)
    {
        $fotos = Foto::where('kruid_id',$request->id)->get();
        $kruid = Kruid::find($request->id);
        foreach($kruid->koppeling as $object){
            $object->Geneeskracht;
        }

        return view('kruid',[
            'fotos' => $fotos,
            'kruid'   =>  $kruid,
            'geneeskracht' => Geneeskracht::all(),
        ]);
    }
    public function save(Request $request){


        $kruid = Kruid::find($request->id);
        $kruid->naam = $request->naam;
        $kruid->latin_naam = $request->latin_naam;
        $kruid->beschrijving = $request->beschrijving;
        $kruid->save();

        return $this->index($request);
    }

}
