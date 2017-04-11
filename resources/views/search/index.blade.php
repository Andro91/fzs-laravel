@extends('layouts.layout')
@section('page_heading','Претрага кандидата')
@section('section')
    <div class="col-lg-10">
        {{--GRESKE--}}
        @if (Session::get('errors'))
            <div class="alert alert-dismissable alert-danger">
                <h4>Грешка!</h4>
                <ul>
                    @foreach (Session::get('errors')->all() as $error)
                        <li>{!! $error !!}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (Session::get('flash-error'))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Грешка!</strong>
                @if(Session::get('flash-error') === 'create')
                    Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                @endif
            </div>
        @endif
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Критеријум за претрагу</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/pretraga') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="text" class="form-control" id="pretraga" name="pretraga">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Тражи">
                    </div>
                </form>
            </div>
        </div>
        @if(!empty($query))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Резултати претраге</h3>
                </div>
                <div class="panel-body">
                    <table id="tabela" class="table">
                        <thead>
                        <th>Број Индекса</th>
                        <th>Име</th>
                        <th>Презиме</th>
                        <th>ЈМБГ</th>
                        <th>Измена</th>
                        </thead>
                        <tbody>
                        @foreach($query as $index => $kandidat)
                            <tr>
                                <td>{{$kandidat->brojIndeksa}}</td>
                                <td>{{$kandidat->imeKandidata}}</td>
                                <td>{{$kandidat->prezimeKandidata}}</td>
                                <td>{{$kandidat->jmbg}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{$putanja}}/{{ $kandidat->tipStudija_id == 1 ? 'kandidat' : 'master' }}/{{ $kandidat->id }}/edit">
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
                                       href="{{$putanja}}/prijava/zaStudenta/{{ $kandidat->id }}">
                                        Испити
                                    </a>
                                    <a class="btn btn-primary btn-sm"
                                       href="{{$putanja}}/izvestaji/potvrdeStudent/{{$kandidat->id}}">
                                        Потврде
                                    </a>
                                    <a class="btn btn-primary btn-sm"
                                       href="{{$putanja}}/skolarina/{{$kandidat->id}}">
                                        Школарина
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
