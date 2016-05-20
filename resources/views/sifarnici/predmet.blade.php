<title>Predmet</title>
@extends('layouts.layout')
@section('page_heading','Predmet')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv predmeta
            </th>
            <th>
                Tip studija
            </th>
            <th>
                Studijski program
            </th>
            <th>
                Godina studija
            </th>
            <th>
                Semestar
            </th>
            <th>
                ESPB
            </th>
            <th>
                Status
            </th>
            </thead>

            @foreach($predmet as $predmet)
                <tr>
                    <td>{{$predmet->naziv}}</td>
                    <td>{{$predmet->tipStudija->naziv}}</td>
                    <td>{{$predmet->studijskiProgram->naziv}}</td>
                    <td>{{$predmet->godinaStudija->naziv}}</td>
                    <td>{{$predmet->semestarSlusanjaPredmeta}}</td>
                    <td>{{$predmet->espb}}</td>
                    <td>{{$predmet->statusPredmeta}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection