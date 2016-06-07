<title>Sportsko angažovanje</title>
@extends('layouts.layout')
@section('page_heading',"Sportsko angažovanje - {$kandidat->imeKandidata} {$kandidat->prezimeKandidata}")
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="t" class="table">
                <thead>
                <th>
                    Sport
                </th>
                <th>
                    Naziv kluba
                </th>
                <th>
                    Uzrast (od - do)
                </th>
                <th>
                    Broj godina
                </th>
                <th>
                    Akcije
                </th>
                </thead>
                @foreach($sportskoAngazovanje as $angazovanje)
                    <tr>
                        <td>{{$angazovanje->sport->naziv}}</td>
                        <td>{{$angazovanje->nazivKluba}}</td>
                        <td>{{$angazovanje->odDoGodina}}</td>
                        <td>{{$angazovanje->ukupnoGodina}}</td>
                        <td>
                            <div>
                                <form class="pull-left" action="/sportskoAngazovanje/{{ $angazovanje->id }}/delete" style="margin: 0 0 0 0 ;">
                                    <input type="submit" class="btn btn-danger" value="Briši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>

        <br>

        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Sportsko angažovanje</h3>
            </div>
            <div class="panel-body">
                <form action="sportskoangazovanje" method="post">

                    {{ csrf_field() }}

                    <div class="form-group pull-left" style="width: 25%;">
                        <label for="sport">Sport</label>
                        <select class="form-control" id="sport" name="sport">
                            @foreach($sport as $item)
                                <option value="{{$item->id}}">{{$item->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pull-left" style="width: 24%; margin-left: 1%">
                        <label for="klub">Klub</label>
                        <input class="form-control" type="text" name="klub" id="klub">
                    </div>

                    <div class="form-group pull-left" style="width: 24%; margin-left: 1%">
                        <label for="uzrast">Uzrast</label>
                        <input class="form-control" type="text" name="uzrast" id="uzrast">
                    </div>

                    <div class="form-group pull-left" style="width: 24%; margin-left: 1%">
                        <label for="godine">Godine</label>
                        <input class="form-control" type="text" name="godine" id="godine">
                    </div>

                    <div class="form-group">
                        <input class="btn btn-primary" type="submit" name="submit" id="submit" value="Dodaj">
                    </div>

                </form>
            </div>
        </div>
        
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection