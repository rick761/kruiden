@extends('layouts.app')
@section('content')

      <main>
            <form method="post" action="SaveKruid">
            <input name="id" type="hidden" value="{{$kruid->id}}" class="form-control">
            @csrf

            <table class="table table-condensed">
                  <thead>
                        <tr>
                              <th>ID</th>
                              <th>{{$kruid->id}}</th>

                        </tr>
                  </thead>
                  <tbody>
                        <tr>
                              <td>naam</td>
                              <td><input name="naam" type="text" value="{{$kruid->naam}}" class="form-control"></td>
                        </tr>
                        <tr>
                              <td>latin_naam</td>
                              <td><input name="latin_naam" type="text" value="{{$kruid->latin_naam}}" class="form-control"></td>
                        </tr>
                        <tr>
                              <td>beschrijving</td>
                              <td><textarea name="beschrijving" type="text" value="" class="form-control">{{$kruid->beschrijving}}</textarea></td>
                        </tr>
                  </tbody>
            </table>
            <input type="submit" class="btn btn-default" value="opslaan">

            </form>
            <br><br>
            <form method="post" action="addFoto" enctype="multipart/form-data">
                  <div  class="form-inline">
                        @csrf
                        <div class="form-group mx-sm-3 mb-2">
                              <label for="exampleFormControlFile1">Upload een foto</label>
                              <input type="hidden" name="id"  value="{{$kruid->id}}" >
                              <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                              Type foto:
                              <select name="type" class="form-control mx-sm-3 mb-2">
                                    <option>5</option>
                                    <option>4</option>
                                    <option>3</option>
                                    <option>2</option>
                                    <option>1</option>
                              </select>
                        </div>
                        <div class="form-group mx-sm-3 mb-2">
                              <input type="submit" class="mx-sm-3 mb-2" value="Add foto">
                        </div>
                  </div>
            </form>
            <section> <!--photothumpnails-->
                  <div class="row">
                        @foreach($fotos as $foto)
                              <div class="col-6 col-sm-3">
                                    <img src="{{URL::asset('images/'.$foto->url)}}" alt="..." class="img-thumbnail">
                                    <div class="dropdown show">
                                          <a class="btn btn-secondary dropdown-toggle" href="https://example.com" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                verander type ({{$foto->type}})
                                          </a>

                                          <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                <a class="dropdown-item" href="{{route('veranderFotoType',['id'=>$kruid->id,'foto_id'=>$foto->id, 'type'=>5])}}">5</a>
                                                <a class="dropdown-item" href="{{route('veranderFotoType',['id'=>$kruid->id,'foto_id'=>$foto->id, 'type'=>4])}}">4</a>
                                                <a class="dropdown-item" href="{{route('veranderFotoType',['id'=>$kruid->id,'foto_id'=>$foto->id, 'type'=>3])}}">3</a>
                                                <a class="dropdown-item" href="{{route('veranderFotoType',['id'=>$kruid->id,'foto_id'=>$foto->id, 'type'=>2])}}">2</a>
                                                <a class="dropdown-item" href="{{route('veranderFotoType',['id'=>$kruid->id,'foto_id'=>$foto->id, 'type'=>1])}}">1</a>
                                          </div>
                                          <a class="btn btn-primary" href="{{route('removeFoto',['id'=>$kruid->id,'foto_id'=>$foto->id])}}" role="button" style="color:red;">X</a>
                                    </div>


                              </div>
                        @endforeach
                  </div>
            </section>

            <br><br>


            <table class="table table-condensed">
                  <thead>
                        <tr>
                              <th>
                                    Helpt tegen/als :
                              </th>
                              <th>
                                    del?
                              </th>
                        </tr>
                  </thead>
                  <tbody>
                        @foreach($kruid->koppeling as $kracht)
                        <tr>
                              <td>
                                    {{$kracht->geneeskracht->naam}}
                              </td>
                              <td>
                                    <a href="{{route('removeKoppeling',[
                                          'id'=> $kracht->kruid_id ,
                                          'koppel_id'=>$kracht->id,
                                          'kruid_id'=> $kracht->kruid_id ,
                                          'geneeskracht_id' => $kracht->geneeskracht_id ,
                                    ])}}">
                                          remove
                                    </a>
                              </td>
                        </tr>
                        @endforeach
                        <tr>
                              <td>
                                    <form class="form-inline" method="post" action="insertGeneeskracht">
                                          @csrf

                                          <input type="hidden" name="id" value="{{$kruid->id}}" class="form-control" />

                                          <div class="form-group mx-sm-3 mb-2">
                                                <input placeholder="new geneeskracht" type="text"  name="naam" class="form-control mx-sm-3 mb-2" />
                                          </div>
                                          <div class="form-group mx-sm-3 mb-2">
                                                <input type="submit" value="voegToe" class="btn btn-default"  />
                                          </div>
                                    </form>
                              </td>
                              <td>
                                    <form method="post" action="insertGeneeskrachtBestaand" class="form-inline" >
                                          @csrf
                                          <input type="hidden" name="id" value="{{$kruid->id}}" class="form-control" />
                                          <div class="form-group mx-sm-3 mb-2">
                                                <select name="geneeskracht" class="form-control mx-sm-3 mb-2">
                                                      @foreach($geneeskracht as $kracht)
                                                            <option >{{$kracht->naam}}</option>
                                                            @endforeach
                                                </select>
                                          </div>
                                          <div class="form-group mx-sm-3 mb-2">
                                                <input type="submit" value="voegToe" class="btn btn-default"  />
                                          </div>
                                    </form>
                              </td>
                        </tr>
                  </tbody>
            </table>




      </main>
@endsection