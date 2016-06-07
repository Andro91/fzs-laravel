<title>Izmeni školu/fakultet</title>
@extends('layouts.layout')
@section('page_heading','Izmeni školu/fakultet')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/srednjeSkoleFakulteti/{{$srednjeSkoleFakulteti->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Izmeni školu/fakultet</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$srednjeSkoleFakulteti->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Škola/Fakultet:</label>
                        <input type="hidden" id="indikatorHidden" name="indikatorHidden"
                               value="{{$srednjeSkoleFakulteti->indSkoleFakulteta}}">
                        <select class="form-control" id="indSkoleFakulteta" name="indSkoleFakulteta">
                            <option value="1">Škola</option>
                            <option value="2">Fakultet</option>
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
            $("#indSkoleFakulteta").val($("#indikatorHidden").val());
        });
    </script>



@endsection