<title>Sportsko angažovanje</title>
@extends('layouts.layout')
@section('page_heading','Sportsko angažovanje')
@section('section')
    <div class="col-md-9">
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

                @foreach($sportskoAngazovanje as $sportskoAngazovanje)
                    <tr>
                        <td>{{$sportskoAngazovanje->nazivKluba}}</td>
                        <td>{{$sportskoAngazovanje->odDoGodina}}</td>
                        <td>{{$sportskoAngazovanje->ukupnoGodina}}</td>
                        <td>{{$sportskoAngazovanje->sport->naziv}}</td>
                        <td>{{$sportskoAngazovanje->kandidat->imeKandidata}}
                            &nbsp; {{$sportskoAngazovanje->kandidat->prezimeKandidata}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="sportskoAngazovanje/edit/{{$sportskoAngazovanje->id}}">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="sportskoAngazovanje/delete/{{$sportskoAngazovanje->id}}">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection