@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h1>{{$kruid->naam}}</h1>
            </div>
            <div class="col-12">
                <p>{{$kruid->latin_naam}}</p>
            </div>
            <div class="col-12">
                <p><?php echo nl2br($kruid->beschrijving) ?></p>
            </div>
            <div class="col-12">
                <p>Helpt tegen/als:</p>
                <ul>
                    @foreach($kruid->koppeling as $kracht)
                        <li>{{$kracht->geneeskracht->naam}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
        <div class="row">
            @foreach ( $kruid->Fotos as $foto )
                <div class="col-md-3">
                    <img src="{{URL::asset('images/'.$foto->url)}}" alt="..." class="img-thumbnail">
                </div>
            @endforeach
        </div>
    </div>



    @endsection