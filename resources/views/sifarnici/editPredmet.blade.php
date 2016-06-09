<title>Измени предмет</title>
@extends('layouts.layout')
@section('page_heading','Измени предмет')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/predmet/{{$predmet->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени предмет</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$predmet->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipStudija_id">Тип студија:</label>
                        <input type="hidden" id="tipStudijaHidden" name="tipStudijaHidden"
                               value="{{$predmet->tipStudija_id}}">
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tipStudija)
                                <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="studijskiProgram_id">Студијски програм:</label>
                        <input type="hidden" id="studijskiProgramHidden" name="studijskiProgramHidden"
                               value="{{$predmet->studijskiProgram_id}}">
                        <select class="form-control" id="studijskiProgram_id" name="studijskiProgram_id">
                            @foreach($studijskiProgram as $studijskiProgram)
                                <option value="{{$studijskiProgram->id}}">{{$studijskiProgram->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="godinaStudija_id">Година:</label>
                        <input type="hidden" id="godinaStudijaHidden" name="godinaStudijaHidden"
                               value="{{$predmet->godinaStudija_id}}">
                        <select class="form-control" id="godinaStudija_id" name="godinaStudija_id">
                            @foreach($godinaStudija as $godinaStudija)
                                <option value="{{$godinaStudija->id}}">{{$godinaStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Семестар:</label>
                        <input name="semestarSlusanjaPredmeta" type="text" class="form-control"
                               value="{{$predmet->semestarSlusanjaPredmeta}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">ЕСПБ:</label>
                        <input name="espb" type="number" class="form-control" value="{{$predmet->espb}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($predmet->statusPredmeta == 1)
                                    <input name="statusPredmeta" value="1" type="checkbox" checked="true">
                                @else
                                    <input name="statusPredmeta" type="checkbox">
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
            $("#studijskiProgram_id").val($("#studijskiProgramHidden").val());
            $("#godinaStudija_id").val($("#godinaStudijaHidden").val());
        });
    </script>

@endsection