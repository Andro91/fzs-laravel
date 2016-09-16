@extends('layouts.layout')
@section('page_heading',"Активни студенти мастер студија")
@section('section')
<div class="col-lg-12">
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
    <ul class="nav nav-pills">
        @foreach($studijskiProgrami as $program)
            <li role="presentation"
                    {{ Request::input('studijskiProgramId') == $program->id  ? 'class=active' : '' }}>
                <a href="?studijskiProgramId={{ $program->id }}">{{ $program->naziv }}</a>
            </li>
        @endforeach
    </ul>
    <hr>
        <table id="tabela" class="table">
            <thead>
            <tr>
                <th>Име</th>
                <th>Презиме</th>
                <th>ЈМБГ</th>
                <th>Број Индекса</th>
                <th>Измена</th>
            </tr>
            </thead>
            <tbody>
            @foreach($studenti as $index => $kandidat)
                <tr>
                    <td>{{$kandidat->imeKandidata}}</td>
                    <td>{{$kandidat->prezimeKandidata}}</td>
                    <td>{{$kandidat->jmbg}}</td>
                    <td>{{$kandidat->brojIndeksa}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">
                            <div title="Измена">
                                <span class="fa fa-edit"></span>
                            </div>
                        </a>
                        <a class="btn btn-danger" href="{{$putanja}}/kandidat/{{ $kandidat->id }}/delete"
                           onclick="return confirm('Да ли сте сигурни да желите да обришете податке овог студента?');">
                            <div title="Брисање">
                                <span class="fa fa-trash"></span>
                            </div>
                        </a>
                        <a class="btn btn-primary btn-sm" href="{{$putanja}}/student/{{ $kandidat->id }}/upis">
                            Статус
                        </a>
                        <a class="btn btn-primary btn-sm"
                           href="{{$putanja}}/prijava/zastudenta/{{ $kandidat->id }}">
                            Испити
                        </a>
                        <a class="btn btn-primary btn-sm"
                           href="{{$putanja}}/izvestaji/potvrdeStudent/{{$kandidat->id}}">
                            Потврде
                        </a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    <br>
    <br>
</div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
