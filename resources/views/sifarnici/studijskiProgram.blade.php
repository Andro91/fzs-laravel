<title>Студијски програм</title>
@extends('layouts.layout')
@section('page_heading','Студијски програм')
@section('section')
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Скраћени назив
                </th>
                <th>
                    Тип студија
                </th>
                <th>
                    Акције
                </th>
                </thead>
                @foreach($studijskiProgram as $studijskiProgram)
                    <tr>
                        <td>{{$studijskiProgram->naziv}}</td>
                        <td>{{$studijskiProgram->skrNazivStudijskogPrograma}}</td>
                        <td>
                            @if($studijskiProgram->tipStudija)
                                {{$studijskiProgram->tipStudija->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="studijskiProgram/{{$studijskiProgram->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');" class="btn" action="studijskiProgram/{{$studijskiProgram->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/studijskiProgram/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Студијски програм</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Скраћени назив:</label>
                        <input name="skrNazivStudijskogPrograma" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipStudija_id">Тип студијског програма:</label>
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tipStudija)
                                <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                            @endforeach
                        </select>
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