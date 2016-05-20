<title>Region</title>
@extends('layouts.layout')
@section('page_heading','Region')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            </thead>

            @foreach($region as $region)
                <tr>
                    <td>{{$region->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection