<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Status studiranja')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv statusa
            </th>
            </thead>

            @foreach($statusStudiranja as $statusStudiranja)
                <tr>
                    <td>{{$statusStudiranja->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection