<title>Дипломски рад - пријава</title>
@extends('layouts.layout')
@section('page_heading','Дипломски рад - пријава')
@section('section')

    <div class="col-sm-12 col-lg-12">

        <div class="col-sm-12 col-lg-9">
            <form role="form" target="_blank" method="post" action="{{ url('/izvestaji/diplomskiAdd/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="program">Студијски програм:</label>
                            <input name="program" type="text" value="{{$program->naziv}}" class="form-control" disabled="disabled">
                        </div>
                        <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                            <label for="predmet">Предмет:</label>
                            <select class="form-control auto-combobox" id="predmet" name="predmet">
                                @foreach($predmeti as $predmet)
                                    <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!--<div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="naziv">Оцена описно:</label>
                            <input name="naziv" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="ocenaBroj">Оцена бројчано:</label>
                            <input name="ocenaBroj" type="text" class="form-control">
                        </div>-->
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="naziv">Тема:</label>
                            <input name="naziv" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="mentor_id">Ментор:</label>
                            <select class="form-control auto-combobox" id="mentor_id" name="predmet">
                                @foreach($profesori as $profesori)
                                    <option value="{{$profesori->id}}">{{$profesori->ime}} {{$profesori->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="datumPrijave">Датум пријаве:</label>
                            <input name="datumPrijave" type="text" class="form-control">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <button type="submit" class="btn btn-primary">Пријава</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>

@endsection