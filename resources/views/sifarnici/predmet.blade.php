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
    <div class="col-md-12">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив предмета
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($predmet as $predmet)
                    <tr>
                        <td>{{$predmet->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="predmet/{{$predmet->id}}/edit">
                                    <input type="submit" class="btn btn-primary btn-sm" value="Измени">
                                </form>
                                <form class="btn" action="predmet/{{$predmet->id}}/editProgram">
                                    <input type="submit" class="btn btn-success btn-sm" value="Додај програм">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="predmet/{{$predmet->id}}/delete">
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