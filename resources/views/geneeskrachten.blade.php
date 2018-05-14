@extends('layouts.app')

@section('content')
<main>


    <table class="table table-condensed">
        <thead>
        <tr>
            <th>
                Geneeskracht :
            </th>
            <th>
                del?
            </th>
        </tr>
        </thead>
        <tbody>
        @foreach($geneeskrachten as $onderdeel)
            <tr>
                <td>
                    {{$onderdeel->naam}}
                </td>
                <td>
                    <a href="{{route('removeGeneeskracht',['id'=>$onderdeel->id])}}">remove</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</main>
@endsection
