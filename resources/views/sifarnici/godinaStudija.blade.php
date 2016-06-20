<title>Година студија</title>
@extends('layouts.layout')
@section('page_heading','Година студија')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Римски
                </th>
                <th>
                    Назив у падежу
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($godinaStudija as $godinaStudija)
                    <tr>
                        <td>{{$godinaStudija->naziv}}</td>
                        <td>{{$godinaStudija->nazivRimski}}</td>
                        <td>{{$godinaStudija->nazivSlovimaUPadezu}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="godinaStudija/{{$godinaStudija->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');" class="btn" action="godinaStudija/{{$godinaStudija->id}}/delete">
                                    <input  type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/godinaStudija/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Година студија</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Римски назив:</label>
                        <input name="nazivRimski" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив у падежу:</label>
                        <input name="nazivSlovimaUPadezu" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Редослед приказивања:</label>
                        <input name="redosledPrikazivanja" type="text" class="form-control">
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