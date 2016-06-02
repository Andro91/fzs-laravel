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
            <th>
                Akcije
            </th>
            </thead>

            @foreach($opstina as $opstina)
                <tr>
                    <td>{{$opstina->naziv}}</td>
                    <td>{{$opstina->region->naziv}}</td>
                    <td>
                        <div class="btn-group">
                            <form class="btn" action="opstina/edit/{{$opstina->id}}">
                                <input type="submit" class="btn btn-primary" value="Promeni">
                            </form>
                            <form class="btn" action="opstina/delete/{{$opstina->id}}">
                                <input type="submit" class="btn btn-primary" value="Izbriši">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <form role="form" method="post" action="{{ url('/opstina/unos') }}">
        {{csrf_field()}}


        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Opština</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Naziv:</label>
                    <input name="naziv" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                    <label for="region_id">Region:</label>
                    <select class="form-control" id="region_id" name="region_id">
                        @foreach($region as $region)
                            <option value="{{$region->id}}">{{$region->naziv}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </div>
        </div>
    </form>

@endsection