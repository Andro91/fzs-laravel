<title>Студијски програм</title>
@extends('layouts.layout')
@section('page_heading','Студијски програм')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/studijskiProgram/add">
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

    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection