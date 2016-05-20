<title>Sportsko angažovanje</title>
@extends('layouts.layout')
@section('page_heading','Sportsko angažovanje')
@section('section')

    <div class="table-responsive">
        <table class="table">
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
            </thead>

            @foreach($sportskoAngazovanje as $sportskoAngazovanje)
                <tr>
                    <td>{{$sportskoAngazovanje->nazivKluba}}</td>
                    <td>{{$sportskoAngazovanje->odDoGodina}}</td>
                    <td>{{$sportskoAngazovanje->ukupnoGodina}}</td>
                    <td>{{$sportskoAngazovanje->sport->naziv}}</td>
                    <td>{{$sportskoAngazovanje->kandidat->imeKandidata}} &nbsp; {{$sportskoAngazovanje->kandidat->prezimeKandidata}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection