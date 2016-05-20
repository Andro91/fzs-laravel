<title>Mesto</title>
@extends('layouts.layout')
@section('page_heading','Mesto')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Naziv opštine
            </th>
            </thead>

            @foreach($mesto as $mesto)
                <tr>
                    <td>{{$mesto->naziv}}</td>
                    <td>{{$mesto->opstina->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection