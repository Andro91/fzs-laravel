<title>Професори</title>
@extends('layouts.layout')
@section('page_heading','Професори')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/profesor/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>
    <br/>
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    ЈМБГ
                </th>
                <th>
                    Име
                </th>
                <th>
                    Презиме
                </th>
                <th>
                    Телефон
                </th>
                <th>
                    Кабинет
                </th>
                <th>
                    Е - мејл
                </th>
                <th>
                    Звање
                </th>
                <th>
                    Статус
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($profesor as $profesor)
                    <tr>
                        <td>{{$profesor->jmbg}}</td>
                        <td>{{$profesor->ime}}</td>
                        <td>{{$profesor->prezime}}</td>
                        <td>{{$profesor->telefon}}</td>
                        <td>{{$profesor->kabinet}}</td>
                        <td>{{$profesor->mail}}</td>
                        <td>{{$profesor->zvanje}}</td>
                        <td>
                            @if($profesor->status)
                                {{$profesor->status->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="profesor/{{$profesor->id}}/edit">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Измени">
                                </form>
                                <form class="btn" action="profesor/{{$profesor->id}}/editPredmet">
                                    <input type="submit" class="btn btn-success btn-sm" value="Додај предмет">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="profesor/{{$profesor->id}}/delete">
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