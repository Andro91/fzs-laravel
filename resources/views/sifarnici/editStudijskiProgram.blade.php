<title>Izmeni studijski program</title>
@extends('layouts.layout')
@section('page_heading','Izmeni studijski program')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/studijskiProgram/{{$studijskiProgram->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Izmeni studijski program</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$studijskiProgram->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Skraćeni naziv:</label>
                        <input name="skrNazivStudijskogPrograma" type="text" class="form-control"
                               value="{{$studijskiProgram->skrNazivStudijskogPrograma}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipStudija_id">Tip studijskog programa:</label>
                        <input type="hidden" id="tipStudijaHidden" name="tipStudijaHidden"
                               value="{{$studijskiProgram->tipStudija_id}}">
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tipStudija)
                                <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="checkbox">
                        <label>
                            @if($studijskiProgram->indikatorAktivan == 1)
                                <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                            @else
                                <input name="indikatorAktivan" type="checkbox">
                            @endif
                            Aktivan</label>
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
            $("#tipStudija_id").val($("#tipStudijaHidden").val());
        });
    </script>

@endsection