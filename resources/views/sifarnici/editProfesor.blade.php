<title>Измени професора</title>
@extends('layouts.layout')
@section('page_heading','Измени професора')
@section('section')

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Основни подаци</a></li>
            <li><a href="#tabs-2">Предмети</a></li>
            <li><a href="#tabs-3">Извештаји</a></li>
        </ul>
        <div id="tabs-1">
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
        </div>
        <div id="tabs-2">
            <div class="btn-group">
                <form class="btn" action="/profesor/{{$profesor->id}}/addPredmet">
                    <input type="submit" class="btn btn-danger" value="Додај">
                </form>
            </div>
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Облик наставе
                </th>
                <th>
                    Семестар
                </th>
                </thead>
                @foreach($predmeti as $predmet)
                    <tr>
                        <td>{{$predmet->predmet->naziv}}</td>
                        <td>{{$predmet->oblik_nastave->naziv}}</td>
                        <td>{{$predmet->semestar->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');"
                                      class="btn" action="/profesor/{{$predmet->id}}/deletePredmet">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <div id="tabs-3">

        </div>
    </div>



    <script>
        $(document).ready(function () {
            $("#status_id").val($("#statusHidden").val());

            $(function () {
                $("#tabs").tabs();
            });
        });
    </script>


@endsection