<title>?????? ??????</title>
@extends('layouts.layout')
@section('page_heading','?????? ??????')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/region/{{$region->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">?????? ??????</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">?????:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$region->naziv}}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">??????</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection