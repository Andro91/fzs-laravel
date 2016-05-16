<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Studijski program')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Skraćeni naziv
            </th>
            <th>
                Tip studija
            </th>
            </thead>

            @foreach($studijskiProgram as $studijskiProgram)
                <tr>
                    <td>{{$studijskiProgram->naziv}}</td>
                    <td>{{$studijskiProgram->skrNazivStudijskogPrograma}}</td>
                    <td>{{$studijskiProgram->tipStudija->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection