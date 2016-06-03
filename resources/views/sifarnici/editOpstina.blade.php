<title>Izmeni opštinu</title>
@extends('layouts.layout')
@section('page_heading','Izmeni opštinu')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/opstina/{{$opstina->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Izmeni opštinu</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$opstina->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="region_id">Region:</label>
                        <input type="hidden" id="regionHidden" name="regionHidden"
                               value="{{$opstina->region_id}}">
                        <select class="form-control" id="region_id" name="region_id">
                            @foreach($region as $region)
                                <option value="{{$region->id}}">{{$region->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Izmeni</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function () {
            $("#region_id").val($("#regionHidden").val());
        });
    </script>

@endsection