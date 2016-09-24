<title>Бодовање</title>
@extends('layouts.layout')
@section('page_heading','Бодовање')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/bodovanje/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>
    <br/>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Описна оцена
                </th>
                <th>
                    Минимум бодова
                </th>
                <th>
                    Максимум бодова
                </th>
                <th>
                    Оцена
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($bodovanje as $bodovanje)
                    <tr>
                        <td>{{$bodovanje->opisnaOcena}}</td>
                        <td>{{$bodovanje->poeniMin}}</td>
                        <td>{{$bodovanje->poeniMax}}</td>
                        <td>{{$bodovanje->ocena}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="bodovanje/{{$bodovanje->id}}/edit">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="bodovanje/{{$bodovanje->id}}/delete">
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