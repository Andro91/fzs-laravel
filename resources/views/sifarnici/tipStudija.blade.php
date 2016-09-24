<title>Тип студија</title>
@extends('layouts.layout')
@section('page_heading','Тип студија')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/tipStudija/add">
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
                    Скраћени назив
                </th>
                <th>
                    Акције
                </th>
                </thead>
                @foreach($tipStudija as $tipStudija)
                    <tr>
                        <td>{{$tipStudija->naziv}}</td>
                        <td>{{$tipStudija->skrNaziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="tipStudija/{{$tipStudija->id}}/edit">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="tipStudija/{{$tipStudija->id}}/delete">
                                    <input type="submit" class="btn btn-danger btn-sm" value="Обриши">
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