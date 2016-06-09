<title>Предмет</title>
@extends('layouts.layout')
@section('page_heading','Предмет')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив предмета
                </th>
                <th>
                    Тип студија
                </th>
                <th>
                    Студијски програм
                </th>
                <th>
                    Година студија
                </th>
                <th>
                    Семестар
                </th>
                <th>
                    ЕСПБ
                </th>
                <th>
                    Статус
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($predmet as $predmet)
                    <tr>
                        <td>{{$predmet->naziv}}</td>
                        <td>
                            @if($predmet->tipStudija)
                                {{$predmet->tipStudija->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>
                            @if($predmet->studijskiProgram)
                                {{$predmet->studijskiProgram->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>
                            @if($predmet->godinaStudija)
                                {{$predmet->godinaStudija->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>{{$predmet->semestarSlusanjaPredmeta}}</td>
                        <td>{{$predmet->espb}}</td>
                        <td>{{$predmet->statusPredmeta}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="predmet/{{$predmet->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form class="btn" action="predmet/{{$predmet->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/predmet/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Предмет</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipStudija_id">Тип студија:</label>
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tipStudija)
                                <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="studijskiProgram_id">Студијски програм:</label>
                        <select class="form-control" id="studijskiProgram_id" name="studijskiProgram_id">
                            @foreach($studijskiProgram as $studijskiProgram)
                                <option value="{{$studijskiProgram->id}}">{{$studijskiProgram->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="godinaStudija_id">Година:</label>
                        <select class="form-control" id="godinaStudija_id" name="godinaStudija_id">
                            @foreach($godinaStudija as $godinaStudija)
                                <option value="{{$godinaStudija->id}}">{{$godinaStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Семестар:</label>
                        <input name="semestarSlusanjaPredmeta" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">ЕСПБ:</label>
                        <input name="espb" type="number" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                <input name="statusPredmeta" type="checkbox">
                                Активан</label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Додај</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection