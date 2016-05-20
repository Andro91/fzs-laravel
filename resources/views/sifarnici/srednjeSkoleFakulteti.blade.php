<title>Srednje škole i fakulteti</title>
@extends('layouts.layout')
@section('page_heading','Srednje škole i fakulteti')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv statusa
            </th>
            <th>
                Indikator
            </th>
            </thead>

            @foreach($srednjeSkoleFakulteti as $srednjeSkoleFakulteti)
                <tr>
                    <td>{{$srednjeSkoleFakulteti->naziv}}</td>
                    <td>{{$srednjeSkoleFakulteti->indSkoleFakulteta}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection