<title>Sportsko angažovanje</title>
@extends('layouts.layout')
@section('page_heading','Sportsko angažovanje')
@section('section')

    <div class="col-md-9">
        <!--<a href="/sportskoAngazovanje/vrati">Visit W3Schools</a>-->
        <!--<form class="btn" action="/kandidat/{{ $kandidat->id }}/edit">
            <input type="submit" class="btn btn-primary" value="Vrati">
        </form>-->
        <a href="/kandidat/{{ $kandidat->id }}/edit">Nazad</a>
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv kluba
                </th>
                <th>
                    Period
                </th>
                <th>
                    Broj godina
                </th>
                <th>
                    Sport
                </th>
                <th>
                    Ime i prezime
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($kandidat->angazovanja as $sportskoAngazovanje)
                    <tr>
                        <td>{{$sportskoAngazovanje->nazivKluba}}</td>
                        <td>{{$sportskoAngazovanje->odDoGodina}}</td>
                        <td>{{$sportskoAngazovanje->ukupnoGodina}}</td>
                        <td>{{$sportskoAngazovanje->sport->naziv}}</td>
                        <td>{{$sportskoAngazovanje->kandidat->imeKandidata}}
                            &nbsp; {{$sportskoAngazovanje->kandidat->prezimeKandidata}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="/sportskoAngazovanje/{{$sportskoAngazovanje->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="/sportskoAngazovanje/{{$sportskoAngazovanje->id}}/delete">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/sportskoAngazovanje/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sportsko angažovanje</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="nazivKluba">Naziv kluba:</label>
                        <input name="nazivKluba" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="odDoGodina">Od do godina:</label>
                        <input name="odDoGodina" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="ukupnoGodina">Ukupno godina:</label>
                        <input name="ukupnoGodina" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="sport_id">Sport:</label>
                        <select class="form-control" id="sport_id" name="sport_id">
                            @foreach($sport as $sport)
                                <option value="{{$sport->id}}">{{$sport->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Dodaj</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection