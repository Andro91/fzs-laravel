@extends('layouts.layout')
@section('page_heading','Школарина')
@section('section')
    <div class="col-lg-12">
        <div>
            <h4>Подаци о студенту</h4>
            <ul class="list-group">
                <li class="list-group-item">Број Индекса:
                    <strong>
                        {{ $kandidat->brojIndeksa }}
                    </strong>
                </li>
                <li class="list-group-item">Име (име родитеља) презиме:
                    <strong>
                        {{ $kandidat->imeKandidata . " (" . $kandidat->imePrezimeJednogRoditelja . ") " . $kandidat->prezimeKandidata }}
                    </strong>
                </li>
                <li class="list-group-item">Тип Студија:
                    <strong>
                        {{ $kandidat->tipStudija->naziv }}
                    </strong>
                </li>
                <li class="list-group-item">Студијски програм:
                    <strong>
                        {{ $kandidat->program->naziv }}
                    </strong>
                </li>
                <li class="list-group-item">Година студија:
                    <strong>
                        {{ $kandidat->godinaStudija->naziv }}
                    </strong>
                </li>
            </ul>
        </div>
        @if(!empty($trenutnaSkolarina))
            <a href="{{$putanja}}/skolarina/izmena/{{$trenutnaSkolarina->id}}" class="btn btn-primary"><span
                        class="fa fa-edit"></span> Измена школарине</a>
            <a href="{{$putanja}}/skolarina/arhiva/{{$kandidat->id}}" class="btn btn-warning"><span
                        class="fa fa-list"></span> Архива школарине</a>
        @else
            <div class="form-group text-center">
            <a href="{{$putanja}}/skolarina/dodavanje/{{$kandidat->id}}" class="btn btn-success btn-lg"><span
                        class="fa fa-plus"></span> Унос школарине</a>
            </div>
        @endif
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
                        Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио
                        школарину и покушајте поново.
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
        @if(!empty($trenutnaSkolarina))
            <div id="skolarina" class="row">
                <div class="col-lg-3">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-university fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{number_format($trenutnaSkolarina->iznos, 2, ',', '.')}}</div>
                                    <div>RSD</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Износ: {{$trenutnaSkolarina->komentar}}</span>
                            <span class="pull-right"><i class="fa fa-comment-o"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-check-square fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{number_format($uplacenIznos, 2, ',', '.')}}</div>
                                    <div>RSD</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Уплаћено</span>
                            <span class="pull-right"><i class="fa fa-check-circle"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="panel panel-danger">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-credit-card fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge">{{number_format($preostaliIznos, 2, ',', '.')}}</div>
                                    <div>RSD</div>
                                </div>
                            </div>
                        </div>
                        <div class="panel-footer">
                            <span class="pull-left">Дуговање</span>
                            <span class="pull-right"><i class="fa fa-exclamation"></i></span>

                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Уплате</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group">
                        <a href="{{$putanja}}/skolarina/uplata/{{$trenutnaSkolarina->id}}" class="btn btn-success">
                            <span class="fa fa-plus"></span> Нова уплата
                        </a>
                    </div>

                    <table class="table">
                        <thead>
                        <tr>
                            <th>Студент</th>
                            <th>Износ</th>
                            <th>Датум</th>
                            <th>Назив</th>
                            <th>Измена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($trenutneUplate))
                            @foreach($trenutneUplate as $index => $uplata)
                                <tr>
                                    <td>{{$uplata->kandidat->imeKandidata . " " . $uplata->kandidat->prezimeKandidata}}</td>
                                    <td>{{number_format($uplata->iznos, 2, ',', '.')}}</td>
                                    <td>{{$uplata->datum->format('d.m.Y.')}}</td>
                                    <td>{{$uplata->naziv}}</td>
                                    <td>
                                        <a class="btn btn-warning" href="{{$putanja}}/skolarina/uplata/edit/{{$uplata->id}}">
                                            <div title="Измена">
                                                <span class="fa fa-edit"></span>
                                            </div>
                                        </a>
                                        <a class="btn btn-danger"
                                           href="{{$putanja}}/skolarina/uplata/delete/{{$uplata->id}}"
                                           onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                            <div title="Брисање">
                                                <span class="fa fa-trash"></span>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
    <br>
    <br>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



