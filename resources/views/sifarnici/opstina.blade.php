<title>Opština</title>
@extends('layouts.layout')
@section('page_heading','Opština')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Naziv regiona
            </th>
            </thead>

            @foreach($opstina as $opstina)
                <tr>
                    <td>{{$opstina->naziv}}</td>
                    <td>{{$opstina->region->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection