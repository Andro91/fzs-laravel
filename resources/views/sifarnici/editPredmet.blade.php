<title>Измени предмет</title>
@extends('layouts.layout')
@section('page_heading','Измени предмет')
@section('section')

    <div id="tabs">
        <ul>
            <li><a href="#tabs-1">Основни подаци</a></li>
            <li><a href="#tabs-2">Студијски програми</a></li>
        </ul>
        <div id="tabs-1">
            <form role="form" method="post" action="{{$putanja}}/predmet/{{$predmet->id}}">
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
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="naziv">ЕСПБ:</label>
                            <input name="espb" type="number" class="form-control" value="{{$predmet->espb}}">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="predavanja">Часови предавања:</label>
                            <input name="predavanja" type="number" class="form-control"
                                   value="{{$predmet->predavanja}}">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="vezbe">Часови вежби:</label>
                            <input name="vezbe" type="number" class="form-control" value="{{$predmet->vezbe}}">
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
        <div id="tabs-2">
            <div class="btn-group">
                <form class="btn" action="/predmet/{{$predmet->id}}/addProgram">
                    <input type="submit" class="btn btn-danger" value="Додај">
                </form>
            </div>
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Тип студија
                </th>
                <th>
                    Година студија
                </th>
                <th>
                    Семестар
                </th>
                <th>
                    Тип предмета
                </th>
                <th>

                </th>
                </thead>
                @foreach($programi as $program)
                    <tr>
                        <td>{{$program->program->naziv}}</td>
                        <td>{{$program->program->tipStudija->naziv}}</td>
                        <td>
                            @if($program->godinaStudija)
                                {{$program->godinaStudija->naziv}}
                            @else
                                ''
                            @endif
                        </td>
                        <td>{{$program->semestar}}</td>
                        <td>
                            @if($program->tipPredmeta)
                                {{$program->tipPredmeta->naziv}}
                            @else
                                ''
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');"
                                      class="btn" action="/predmet/{{$program->id}}/deleteProgram">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>

        </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#tabs").tabs();

            $("#tipStudija_id").val($("#tipStudijaHidden").val());
            $("#studijskiProgram_id").val($("#studijskiProgramHidden").val());
            $("#godinaStudija_id").val($("#godinaStudijaHidden").val());
            $("#tipPredmeta_id").val($("#tipPredmetaHidden").val());
        });

        $('#tabela').dataTable({
            "aaSorting": [],
            "oLanguage": {
                "sProcessing": "Процесирање у току...",
                "sLengthMenu": "Прикажи _MENU_ елемената",
                "sZeroRecords": "Није пронађен ниједан резултат",
                "sInfo": "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
                "sInfoEmpty": "Приказ 0 до 0 од укупно 0 елемената",
                "sInfoFiltered": "(филтрирано од укупно _MAX_ елемената)",
                "sInfoPostFix": "",
                "sSearch": "Претрага:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Почетна",
                    "sPrevious": "Претходна",
                    "sNext": "Следећа",
                    "sLast": "Последња"
                }
            }
        });

    </script>

@endsection