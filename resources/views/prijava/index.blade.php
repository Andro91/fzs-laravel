@extends('layouts.layout')
@section('page_heading','Испити')
@section('section')
    <div class="col-lg-12">
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
                <li class="list-group-item">ЈМБГ:
                    <strong>
                        {{ $kandidat->jmbg }}
                    </strong>
                </li>
                @if(!empty($kandidat->datumRodjenja))
                    <li class="list-group-item">Датум рођења:
                        <strong>
                            {{ $kandidat->datumRodjenja->format('d.m.Y') }}
                        </strong>
                    </li>
                @endif
            </ul>
        </div>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Пријава за полагање испита</h3>
            </div>
            <div class="panel-body">
                <a href="{{$putanja}}/prijava/student/{{$kandidat->id}}" class="btn btn-primary"><span
                            class="fa fa-plus"></span> Нова пријава</a>

                <a href="{{$putanja}}/priznavanjeIspita/{{$kandidat->id}}" class="btn btn-info"><span
                            class="fa fa-plus"></span> Признати испити</a>

                <a href="{{$putanja}}/prijava/unosPrivremeni/{{$kandidat->id}}" class="btn btn-warning">
                    <i class="fa fa-plus"></i> Додај испите ретроактивно</a>

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
                            <td>{{$prijava->predmet->predmet->naziv}}</td>
                            <td>{{$prijava->rok->naziv}}</td>
                            <td>{{$prijava->brojPolaganja}}</td>
                            <td>{{$prijava->datum->format('d.m.Y')}}</td>
                            <td>
                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                <a class="btn btn-danger"
                                   href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @if($kandidat->tipStudija_id == 1)
        @endif
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Дипломирање</h3>
            </div>
            <div class="panel-body">
                @if($diplomskiRadTema != null || $diplomskiRadPolaganje != null || $diplomskiRadOdbrana != null)
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th>ВРСТА</th>
                            <th>Назив</th>
                            <th>Предмет</th>
                            <th>Тему одобрио професор</th>
                            <th>Одбрану одобрио професор</th>
                            <th>Одобрена</th>
                            {{--<th>Датум пријаве</th>--}}
                            {{--<th>Датум одбране</th>--}}
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>
                        @if($diplomskiRadTema != null)
                            <tr>
                            <td>Пријава ТЕМЕ</td>
                            <td>{{$diplomskiRadTema->nazivTeme}}</td>
                            <td>{{$diplomskiRadTema->predmet->predmet->naziv}}</td>
                            <td>{{$diplomskiRadTema->profesor->ime . " " . $diplomskiRadTema->profesor->prezime}}</td>
                            <td>-</td>
                            <td>
                                @if($diplomskiRadTema->indikatorOdobreno == 1)
                                    <div class='label label-success'>ДА</div>
                                @else
                                    <div class='label label-danger'>НЕ</div>
                                @endif
                            </td>
                            {{--<td>{{$diplomskiRadTema->datum->format('d.m.Y')}}</td>--}}
                            {{--<td>-</td>--}}
                            <td>
                                <a class="btn btn-warning" href="{{$putanja}}/prijava/diplomskiTema/{{ $kandidat->id }}/edit">
                                    <div title="Измена">
                                        <span class="fa fa-edit"></span>
                                    </div>
                                </a>
                                <a class="btn btn-danger" href="{{$putanja}}/deleteDiplomskiTema/{{ $kandidat->id }}/delete"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете?');">
                                    <div title="Брисање">
                                        <span class="fa fa-trash"></span>
                                    </div>
                                </a>
                            </td>
                        </tr>
                        @endif
                        @if($diplomskiRadOdbrana != null)
                            <tr>
                                <td>Пријава ОДБРАНЕ</td>
                                <td>{{$diplomskiRadOdbrana->nazivTeme}}</td>
                                <td>{{$diplomskiRadOdbrana->predmet->predmet->naziv}}</td>
                                <td>{{$diplomskiRadOdbrana->odobrioTemuProfesor->ime . " " . $diplomskiRadOdbrana->odobrioTemuProfesor->prezime}}</td>
                                <td>{{$diplomskiRadOdbrana->odobrioOdbranuProfesor->ime . " " . $diplomskiRadOdbrana->odobrioOdbranuProfesor->prezime}}</td>
                                <td>
                                    @if($diplomskiRadOdbrana->indikatorOdobreno == 1)
                                        <div class='label label-success'>ДА</div>
                                    @else
                                        <div class='label label-danger'>НЕ</div>
                                    @endif
                                </td>
                                {{--<td>{{$diplomskiRadOdbrana->datumPrijave->format('d.m.Y')}}</td>--}}
                                {{--<td>{{$diplomskiRadOdbrana->datumOdbrane->format('d.m.Y')}}</td>--}}
                                <td>
                                    <a class="btn btn-warning" href="{{$putanja}}/prijava/diplomskiOdbrana/{{ $kandidat->id }}/edit">
                                        <div title="Измена">
                                            <span class="fa fa-edit"></span>
                                        </div>
                                    </a>
                                    <a class="btn btn-danger" href="{{$putanja}}/deleteDiplomskiOdbrana/{{ $kandidat->id }}/delete"
                                       onclick="return confirm('Да ли сте сигурни да желите да обришете?');">
                                        <div title="Брисање">
                                            <span class="fa fa-trash"></span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endif
                        @if($diplomskiRadPolaganje != null)
                            <tr>
                                <td>Пријава ПОЛАГАЊА</td>
                                <td>{{$diplomskiRadPolaganje->nazivTeme}}</td>
                                <td>{{$diplomskiRadPolaganje->predmet->predmet->naziv}}</td>
                                <td>{{$diplomskiRadPolaganje->profesor->ime . " " . $diplomskiRadPolaganje->profesor->prezime}}</td>
                                <td>-</td>
                                <td>
                                    @if($diplomskiRadPolaganje->brojBodova > 0)
                                        <div class='label label-success'>Оцена: {{$diplomskiRadPolaganje->ocena}}</div>
                                    @endif
                                </td>
                                {{--<td>-</td>--}}
                                {{--<td>{{$diplomskiRadPolaganje->datum->format('d.m.Y')}}</td>--}}
                                <td>
                                    <a class="btn btn-warning" href="{{$putanja}}/prijava/diplomskiPolaganje/{{ $kandidat->id }}/edit">
                                        <div title="Измена">
                                            <span class="fa fa-edit"></span>
                                        </div>
                                    </a>
                                    <a class="btn btn-danger" href="{{$putanja}}/deleteDiplomskiPolaganje/{{ $kandidat->id }}/delete"
                                       onclick="return confirm('Да ли сте сигурни да желите да обришете?');">
                                        <div title="Брисање">
                                            <span class="fa fa-trash"></span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endif
                        </tbody>
                    </table>
                @endif
                <a href="{{$putanja}}/prijava/diplomskiTema/{{$kandidat->id}}" class="btn btn-success"
                @if($diplomskiRadTema != null) {{ 'disabled' }}@endif>
                    <i class="fa fa-plus"></i> Пријава теме дипломског рада</a>

                <a href="{{$putanja}}/prijava/diplomskiOdbrana/{{$kandidat->id}}" class="btn btn-success"
                @if($diplomskiRadOdbrana != null) {{ 'disabled' }}@endif>
                    <i class="fa fa-plus"></i> Пријава одбране дипломског рада</a>

                <a href="{{$putanja}}/prijava/diplomskiPolaganje/{{$kandidat->id}}" class="btn btn-success"
                @if($diplomskiRadPolaganje != null) {{ 'disabled' }}@endif>
                    <i class="fa fa-plus"></i> Пријава за полагање дипломског испита</a>
            </div>
        </div>

        <br>
        <br>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



