@extends('layouts.app')
@section('content')


            <div class="row">
                  @foreach($kruiden as $kruid)


                  <div class="col-sm-4 kruid" style="background-image:url('{{URL::asset('images/'.$kruid->displayFoto()['url'])}}')"> <!-- item in row-->
                        <a href="{{route( 'kruidVisit',['id'=>$kruid->id] )}}">

                              <h1>{{$kruid->naam}}</h1>


                        </a>
                  </div>
                  @endforeach
            </div>

@endsection