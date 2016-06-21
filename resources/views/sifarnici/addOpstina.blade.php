<title>Додавање општинe</title>
@extends('layouts.layout')
@section('page_heading','Додавање општинe')
@section('section')

    <form role="form" method="post" action="{{ url('/opstina/unos') }}">
        {{csrf_field()}}


        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Општина</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Назив:</label>
                    <input name="naziv" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                    <label for="region_id">Регион:</label>
                    <select class="form-control" id="region_id" name="region_id">
                        @foreach($region as $region)
                            <option value="{{$region->id}}">{{$region->naziv}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Додај</button>
                </div>
            </div>
        </div>
    </form>

@endsection