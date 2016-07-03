<title>Тип предмета</title>
@extends('layouts.layout')
@section('page_heading','Тип предмета')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/tipPredmeta/add">
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

                @foreach($tipPredmeta as $tipPredmeta)
                    <tr>
                        <td>{{$tipPredmeta->naziv}}</td>
                        <td>{{$tipPredmeta->skrNaziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="tipPredmeta/{{$tipPredmeta->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="tipPredmeta/{{$tipPredmeta->id}}/delete">
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