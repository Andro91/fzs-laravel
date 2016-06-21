<title>Статус студирања</title>
@extends('layouts.layout')
@section('page_heading','Статус студирања')
@section('section')
    <div>
        <form class="btn" method="GET" action="statusStudiranja/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>

    <br/>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив статуса
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($statusStudiranja as $statusStudiranja)
                    <tr>
                        <td>{{$statusStudiranja->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="statusStudiranja/{{$statusStudiranja->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');" class="btn" action="statusStudiranja/{{$statusStudiranja->id}}/delete">
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