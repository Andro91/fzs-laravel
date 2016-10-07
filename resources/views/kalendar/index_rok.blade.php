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
        @endif
    </div>
    <hr>
    <a href="{{$putanja}}/kalendar/createRok/" class="btn btn-primary"><span class="fa fa-plus"></span> Нови рок</a>
    <br>
    <br>
    @if(!empty($ispitniRokovi))
        <table id="tabela" class="table">
            <thead>
            <tr>
                <th>Основни рок</th>
                <th>Назив</th>
                <th>Почетак</th>
                <th>Крај</th>
                <th>Тип рока</th>
                <th>Коментар</th>
                <th></th>
            </tr>
            </thead>
            @foreach($ispitniRokovi as $rok)
                <tr>
                    <td>{{$rok->nadredjeniRok->naziv}}</td>
                    <td>{{$rok->naziv}}</td>
                    <td>{{$rok->pocetak->format('d.m.Y.')}}</td>
                    <td>{{$rok->kraj->format('d.m.Y.')}}</td>
                    <td>{{\App\AktivniIspitniRokovi::tipRoka($rok->tipRoka_id)}}</td>
                    <td>{{$rok->komentar}}</td>
                    <td>
                        <a class="btn btn-warning" href="{{$putanja}}/kalendar/editRok/{{ $rok->id }}">
                            <div title="Измена">
                                <span class="fa fa-edit"></span>
                            </div>
                        </a>
                        <a class="btn btn-danger" href="{{$putanja}}/kalendar/deleteRok/{{ $rok->id }}"
                           onclick="return confirm('Да ли сте сигурни да желите да обришете испитни рок?');">
                            <div title="Брисање">
                                <span class="fa fa-trash"></span>
                            </div>
                        </a>
                    </td>
                </tr>
            @endforeach
        </table>
    @endif
    <br/>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



