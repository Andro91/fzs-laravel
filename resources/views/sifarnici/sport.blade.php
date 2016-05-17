<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Sportovi')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            </thead>

            @foreach($sport as $sport)
                <tr>
                    <td>{{$sport->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection