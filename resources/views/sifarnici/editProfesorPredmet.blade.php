<title>Додај предмет</title>
@extends('layouts.layout')
@section('page_heading','Додај предмет')
@section('section')
    <div class="col-md-9">
        <a href="/profesor">&#60;&#60;Назад на професоре</a><br/><br/>

        <div class="btn-group">
            <form class="btn" action="/profesor/{{$profesor->id}}/addPredmet">
                <input type="submit" class="btn btn-danger" value="Додај">
            </form>
        </div>
        <table id="tabela" class="table">
            <thead>
            <th>
                Назив
            </th>
            <th>
                Тип предмета
            </th>
            <th>
                Семестар
            </th>
            <th>
                Облик наставе
            </th>
            </thead>
            @foreach($predmeti as $predmet)
                <tr>
                    <td>{{$predmet->predmet->predmet->naziv}}
                        - {{$predmet->predmet->program->skrNazivStudijskogPrograma}}</td>
                    <td>{{$predmet->predmet->tipPredmeta->naziv}}</td>
                    <td>{{$predmet->predmet->semestar}}</td>
                    <td>{{$predmet->oblik_nastave->naziv}}</td>
                    <td>
                        <div class="btn-group">
                            <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');"
                                  class="btn" action="/profesor/{{$predmet->id}}/deletePredmet">
                                <input type="submit" class="btn btn-danger" value="Обриши">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>

@endsection