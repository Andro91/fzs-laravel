<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Tip studija')
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
            </thead>
            @foreach($tipStudija as $tipStudija)
                <tr>
                    <td>{{$tipStudija->naziv}}</td>
                    <td>{{$tipStudija->skrNaziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection