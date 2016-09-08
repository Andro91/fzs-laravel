@extends('layouts.layout')
@section('page_heading','Пријава испита')
@section('section')
    <h3>Студент: {{ $kandidat->imeKandidata . " " . $kandidat->prezimeKandidata . " " . $kandidat->brojIndeksa }}</h3>
    <br>
    <a href="{{$putanja}}/prijava/student/{{$kandidat->id}}" class="btn btn-primary"><span class="fa fa-plus"></span> Нова пријава</a>
    <div id="messages">
        @if (Session::get('flash-error'))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Грешка!</strong>
                @if(Session::get('flash-error') === 'update')
                    Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                @elseif(Session::get('flash-error') === 'delete')
                    Дошло је до грешке при брисању података! Молимо вас покушајте поново.
                @elseif(Session::get('flash-error') === 'upis')
                    Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио школарину и покушајте поново.
                @endif
            </div>
        @elseif(Session::get('flash-success'))
            <div class="alert alert-dismissible alert-success">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Успех!</strong>
                @if(Session::get('flash-success') === 'update')
                    Подаци о кандидату су успешно сачувани.
                @elseif(Session::get('flash-success') === 'delete')
                    Подаци о кандидату су успешно обрисани.
                @elseif(Session::get('flash-success') === 'upis')
                    Упис кандидата је успешно извршен.
                @endif
            </div>
        @endif
    </div>
    <hr>
    <table id="tabela" class="table">
        <thead>
        <tr>
            <th>Кандидат</th>
            <th>Број Индекса</th>
            <th>Предмет</th>
            <th>Рок</th>
            <th>Број Полагања</th>
            <th>Датум</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($prijave as $index => $prijava)
            <tr>
                <td>{{$kandidat->imeKandidata . " " . $kandidat->prezimeKandidata}}</td>
                <td>{{$kandidat->brojIndeksa}}</td>
                <td>{{$prijava->predmet->naziv}}</td>
                <td>{{$prijava->rok->naziv}}</td>
                <td>{{$prijava->brojPolaganja}}</td>
                <td>{{$prijava->datum}}</td>
                <td>
                    {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                    <a class="btn btn-danger" href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"
                       onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br>
    <br>
<script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



