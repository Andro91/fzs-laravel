<title>Предмет</title>
@extends('layouts.layout')
@section('page_heading','Предмет')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/predmet/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>
    <br/>
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
                    Тип предмета
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
                            @if($predmet->tipPredmeta)
                                {{$predmet->tipPredmeta->naziv}}
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
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="predmet/{{$predmet->id}}/delete">
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