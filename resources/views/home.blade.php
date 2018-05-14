@extends('layouts.app')

@section('content')
<main>

    <table class="table table-condensed">
        <thead>
        <tr>
            <th>
                Kruid :
            </th>
            <th>
                pic
            </th>
            <th>
                del?
            </th>
        </tr>
        </thead>
        <tbody>
            @foreach($kruiden as $kruid)
            <tr>
                <td>
                    <a href="{{ route('EditKruid' ,['id'=>$kruid->id])}}">{{$kruid->naam}}</a>
                </td>
                <td >
                    <div>
                    @foreach($kruid->Fotos as  $foto)

                        <div class="col-2 col-sm-1">
                            <img src="{{URL::asset('images/'.$foto->url)}}" alt="..." class="img-thumbnail">
                        </div>
                    @endforeach
                    </div>

                </td>
                <td>
                    <a href="{{route('RemoveKruid',['id'=>$kruid->id])}}">remove</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table >

    <form method="post" action="addKruid">
        @csrf
        <table class="table table-condensed">

            <tbody>
                <tr>
                    <td>
                        <input name="naam" type="text" placeholder="Naam van kruid" value="" class="form-control">
                    </td>
                    <td>
                        <input type="submit"  value="Voeg toe" class="form-control">
                    </td>
                </tr>

            </tbody>
        </table>




    </form>


</main>
@endsection
