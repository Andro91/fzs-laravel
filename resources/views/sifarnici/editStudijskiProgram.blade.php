<title>Измени студијски програм</title>
@extends('layouts.layout')
@section('page_heading','Измени студијски програм')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/studijskiProgram/{{$studijskiProgram->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени студијски програм</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$studijskiProgram->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Скраћени назив:</label>
                        <input name="skrNazivStudijskogPrograma" type="text" class="form-control"
                               value="{{$studijskiProgram->skrNazivStudijskogPrograma}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipStudija_id">Тип студијског програма:</label>
                        <input type="hidden" id="tipStudijaHidden" name="tipStudijaHidden"
                               value="{{$studijskiProgram->tipStudija_id}}">
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tipStudija)
                                <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($studijskiProgram->indikatorAktivan == 1)
                                    <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                                @else
                                    <input name="indikatorAktivan" type="checkbox">
                                @endif
                                Активан</label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Измени</button>
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