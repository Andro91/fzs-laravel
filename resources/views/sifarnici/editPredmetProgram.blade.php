<title>Додај програм</title>
@extends('layouts.layout')
@section('page_heading','Додај програм')
@section('section')

    <div class="col-md-9">
        <a href="/predmet">&#60;&#60;Назад на предмете</a><br/><br/>
        <div class="btn-group">
            <form class="btn" action="/predmet/{{$predmet->id}}/addProgram">
                <input type="submit" class="btn btn-danger" value="Додај">
            </form>
        </div>
        <table id="tabela" class="table">
            <thead>
            <th>
                Назив
            </th>
            <th>
                Тип студија
            </th>
            <th>
                Година студија
            </th>
            <th>
                Семестар
            </th>
            <th>
                Тип предмета
            </th>
            <th>
                ЕСПБ
            </th>
            <th>

            </th>
            </thead>
            @foreach($programi as $program)
                <tr>
                    <td>
                        @if($program->program)
                            {{$program->program->naziv}}
                        @else

                        @endif</td>
                    <td>
                        @if($program->program)
                            {{$program->program->tipStudija->naziv}}
                        @else

                        @endif</td>
                    <td>
                        @if($program->godinaStudija)
                            {{$program->godinaStudija->naziv}}
                        @else

                        @endif
                    </td>
                    <td>{{$program->semestar}}</td>
                    <td>
                        @if($program->tipPredmeta)
                            {{$program->tipPredmeta->naziv}}
                        @else

                        @endif
                    </td>
                    <td>{{$program->espb}}</td>
                    <td>
                        <div class="btn-group">
                            <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');"
                                  class="btn" action="/predmet/{{$program->id}}/deleteProgram">
                                <input type="submit" class="btn btn-danger" value="Обриши">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection