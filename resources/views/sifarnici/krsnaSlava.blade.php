<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Krsna slava')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Datum
            </th>
            </thead>

            @foreach($krsnaSlava as $krsnaSlava)
                <tr>
                    <td>{{$krsnaSlava->naziv}}</td>
                    <td>{{$krsnaSlava->datumSlave}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection