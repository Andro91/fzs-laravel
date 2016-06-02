@extends('layouts.layout')
@section('page_heading','Pregled kandidata')
@section('section')
    <div class="col-sm-12 col-lg-10">
            <table class="table table-striped">
                <thead>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>JMBG</th>
                    <th>Izmena</th>
                </thead>
                <tbody>
                @foreach($kandidati as $kandidat)
                    <tr>
                        <td>{{$kandidat->imeKandidata}}</td>
                        <td>{{$kandidat->prezimeKandidata}}</td>
                        <td>{{$kandidat->jmbg}}</td>
                        <td><a href="/kandidat/{{ $kandidat->id }}/edit">Izmeni</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>
@endsection
