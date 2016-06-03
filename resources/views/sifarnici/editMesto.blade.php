<title>Izmeni mesto</title>
@extends('layouts.layout')
@section('page_heading','Izmeni mesto')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/mesto/{{$mesto->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Mesto</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$mesto->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="opstina_id">Opština:</label>
                        <input type="hidden" id="opstinaHidden" name="opstinaHidden"
                               value="{{$mesto->opstina_id}}">
                        <select class="form-control" id="opstina_id" name="opstina_id">
                            @foreach($opstina as $opstina)
                                <option value="{{$opstina->id}}">{{$opstina->naziv}}</option>
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
            $("#opstina_id").val($("#opstinaHidden").val());
        });
    </script>


@endsection