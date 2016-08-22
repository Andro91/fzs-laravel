@extends('layouts.layout')
@section('page_heading','Пријава испита')
@section('section')
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
                    Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио школарину и
                    покушајте поново.
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
    <ul class="nav nav-pills">
        @foreach($tipStudija as $tip)
            <li role="presentation"
                    {{ Request::input('tipStudijaId') == $tip->id  ? 'class=active' : '' }}>
                <a href="?tipStudijaId={{ $tip->id }}">{{ $tip->naziv }}</a>
            </li>
        @endforeach
    </ul>
    <br>
    @if(!empty(Request::input('tipStudijaId')))
    <ul class="nav nav-pills">
        @foreach($studijskiProgrami as $program)
            <li role="presentation"
                    {{ Request::input('studijskiProgramId') == $program->id  ? 'class=active' : '' }}>
                <a href="?tipStudijaId={{ Request::input('tipStudijaId') }}&studijskiProgramId={{ $program->id }}">{{ $program->naziv }}</a>
            </li>
        @endforeach
    </ul>
    <br>
    <hr>
    @endif

    @if(!empty($predmeti))
    <table id="tabela" class="table">
        <thead>
        <th>Назив предмета</th>
        <th>Тип студија</th>
        <th>Студијски програм</th>
        <th>Тип предмета</th>
        <th>Година студија</th>
        <th>Семестар</th>
        <th>ЕСПБ</th>
        <th>Статус</th>
        <th>Акције</th>
        </thead>
        @foreach($predmeti as $predmet)
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
                        <a href="prijava/zapredmet/{{$predmet->id}}" class="btn btn-primary">Пријава испита</a>
                    </div>
                </td>
            </tr>
        @endforeach
    </table>
    @endif
    <br/>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



