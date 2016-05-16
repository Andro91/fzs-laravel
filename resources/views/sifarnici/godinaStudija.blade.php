<title>Tip studija</title>
@extends('layouts.layout')
@section('page_heading','Godina studija')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Rimski
            </th>
            <th>
                Naziv u padežu
            </th>
            </thead>

            @foreach($godinaStudija as $godinaStudija)
                <tr>
                    <td>{{$godinaStudija->naziv}}</td>
                    <td>{{$godinaStudija->nazivRimski}}</td>
                    <td>{{$godinaStudija->nazivSlovimaUPadezu}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection