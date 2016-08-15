<title>Измени професора</title>
@extends('layouts.layout')
@section('page_heading','Измени професора')
@section('section')

    <form role="form" method="post" action="{{$putanja}}/profesor/{{$profesor->id}}">
        {{csrf_field()}}
        {{method_field('PATCH')}}


        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Професор</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="jmbg">ЈМБГ:</label>
                    <input name="jmbg" type="text" class="form-control" value="{{$profesor->jmbg}}">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="ime">Име:</label>
                    <input name="ime" type="text" class="form-control" value="{{$profesor->ime}}">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="prezime">Презиме:</label>
                    <input name="prezime" type="text" class="form-control" value="{{$profesor->prezime}}">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="telefon">Телефон:</label>
                    <input name="telefon" type="text" class="form-control" value="{{$profesor->telefon}}">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="mail">Е-маил:</label>
                    <input name="mail" type="text" class="form-control" value="{{$profesor->mail}}">
                </div>
                <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                    <input type="hidden" id="statusHidden" value="{{$profesor->status_id}}">
                    <label for="status_id">Статус:</label>
                    <select class="form-control" id="status_id" name="status_id">
                        @foreach($status as $status)
                            <option value="{{$status->id}}">{{$status->naziv}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="kabinet">Кабинет:</label>
                    <input name="kabinet" type="text" class="form-control" value="{{$profesor->kabinet}}">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="zvanje">Звање:</label>
                    <input name="zvanje" type="text" class="form-control" value="{{$profesor->jmbg}}">
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Измени</button>
                </div>
            </div>
        </div>
    </form>

    <script>
        $(document).ready(function () {
            $("#status_id").val($("#statusHidden").val());
        });
    </script>


@endsection