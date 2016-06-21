<title>Година студија</title>
@extends('layouts.layout')
@section('page_heading','Година студија')
@section('section')

    <div>
        <form class="btn" method="GET" action="godinaStudija/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>
    <br/>
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
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');"
                                      class="btn" action="godinaStudija/{{$godinaStudija->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection