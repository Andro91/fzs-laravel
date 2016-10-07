@extends('layouts.layout')
@section('page_heading',"Статус студента")
@section('section')
    <div class="col-lg-12">

        {{--Modal za upis na master studije POCETAK--}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{$putanja}}/student/{{ $kandidat->id }}/upisMasterStudija">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                        aria-hidden="true">&times;</span></button>
                            <h4 class="modal-title" id="myModalLabel">Упис на мастер студије</h4>
                        </div>
                        <div class="modal-body">
                            {{ csrf_field() }}
                            <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">

                            <div class="form-group">
                                <label for="StudijskiProgram">Студијски програм</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->studijskiProgram_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Затвори</button>
                            <input type="submit" class="btn btn-success" value="Изврши упис">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        {{--Modal za upis na master studije KRAJ--}}

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
                        Дошло је до грешке при упису студента! Молимо вас проверите да ли је студент уплатио школарину и
                        покушајте поново.
                    @endif
                </div>
            @elseif(Session::get('flash-success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Успех!</strong>
                    @if(Session::get('flash-success') === 'update')
                        Подаци о студенту су успешно сачувани.
                    @elseif(Session::get('flash-success') === 'delete')
                        Подаци о студенту су успешно обрисани.
                    @elseif(Session::get('flash-success') === 'upis')
                        Упис студента је успешно извршен.
                    @endif
                </div>
            @endif
        </div>
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
                        {{ $kandidat->imeKandidata . " " . $kandidat->imePrezimeJednogRoditelja . " " . $kandidat->prezimeKandidata }}
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
                <h3 class="panel-title">Статус студија</h3>
            </div>
            <div class="panel-body">
                <a href="/student/{{ $kandidat->id }}/status/3" class="btn btn-primary">Врати на статус кандидата</a>
                @if($kandidat->statusUpisa_id == 4)
                    <a href="/student/{{ $kandidat->id }}/status/1" class="btn btn-warning">Одмрзни годину</a>
                @else
                    <a href="/student/{{ $kandidat->id }}/status/4" class="btn btn-warning">Замрзни годину</a>
                @endif
                @if($kandidat->tipStudija_id == 1)
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#myModal">
                        Упис на мастер студије
                    </button>
                @endif
            </div>
        </div>
        <div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Година студија</h3>
                </div>
                <div class="panel-body">
                    @if(!$masterStudije->isEmpty())
                        <h4>Мастер студије</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Година</th>
                                <th>Покушај</th>
                                <th>Статус</th>
                                <th>Датум уписа</th>
                                <th>Датум промене</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($masterStudije as $godina)
                                <tr @if($godina->pokusaj > 1) class="warning" @else class="info" @endif>
                                    <td>{{ $godina->godina }}</td>
                                    <td>{{ $godina->pokusaj }}</td>
                                    <td>
                                        @if($godina->statusGodine_id == 1)
                                            <span class='label label-success'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 2)
                                            <span class='label label-default'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 3)
                                            <span class='label label-danger'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 4)
                                            <span class='label label-warning'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 5)
                                            <span class='label label-info'>{{$godina->status->naziv}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($godina->datumUpisa))
                                            {{$godina->datumUpisa->format('d.m.Y.')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($godina->datumPromene))
                                            {{$godina->datumPromene->format('d.m.Y.')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($godina->statusGodine_id == 1)
                                            <a class="btn btn-danger btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUpis?upisId={{ $godina->id }}">
                                                <i class="fa fa-ban"></i> Поништи упис
                                            </a>
                                        @elseif($godina->statusGodine_id == 3)
                                            <a class="btn btn-success btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/upisiStudenta?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уписао
                                                годину
                                            </a>
                                        @endif

                                        @if($godina->pokusaj == 1 && ($godina->statusGodine_id == 1 || $godina->statusGodine_id == 4))
                                            <a class="btn btn-warning btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obnova?godina={{ $godina->godina }}&tipStudijaId={{ $godina->tipStudija_id }}">
                                                Обнови годину
                                            </a>
                                        @elseif($godina->pokusaj > 1)
                                            <a class="btn btn-danger btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obrisiObnovu?upisId={{ $godina->id }}"
                                               onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                                <span style="margin: 3px" class="fa fa-trash"></span>
                                            </a>
                                        @endif
                                        <a class="btn btn-warning"
                                           href="{{$putanja}}/student/{{ $godina->id }}/izmenaGodine">
                                            <div title="Измена">
                                                <span class="fa fa-edit"></span>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    @if(!$osnovneStudije->isEmpty())
                        <h4>Основне студије</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Година</th>
                                <th>Покушај</th>
                                <th>Статус</th>
                                <th>Датум уписа</th>
                                <th>Датум промене</th>
                                <th></th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($osnovneStudije as $godina)
                                <tr @if($godina->pokusaj > 1) class="warning" @else class="info" @endif>
                                    <td>{{ $godina->godina }}</td>
                                    <td>{{ $godina->pokusaj }}</td>
                                    <td>
                                        @if($godina->statusGodine_id == 1)
                                            <span class='label label-success'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 2)
                                            <span class='label label-default'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 3)
                                            <span class='label label-danger'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 4)
                                            <span class='label label-warning'>{{$godina->status->naziv}}</span>
                                        @elseif($godina->statusGodine_id == 5)
                                            <span class='label label-info'>{{$godina->status->naziv}}</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($godina->datumUpisa))
                                            {{$godina->datumUpisa->format('d.m.Y.')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if(!empty($godina->datumPromene))
                                            {{$godina->datumPromene->format('d.m.Y.')}}
                                        @endif
                                    </td>
                                    <td>
                                        @if($godina->statusGodine_id == 1)
                                            <a class="btn btn-danger btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUpis?upisId={{ $godina->id }}">
                                                <i class="fa fa-ban"></i> Поништи упис
                                            </a>
                                        @elseif($godina->statusGodine_id == 3)
                                            <a class="btn btn-success btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/upisiStudenta?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уписао
                                                годину
                                            </a>
                                        @endif

                                        @if($godina->pokusaj == 1 && ($godina->statusGodine_id == 1 || $godina->statusGodine_id == 4))
                                            <a class="btn btn-warning btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obnova?godina={{ $godina->godina }}&tipStudijaId={{ $godina->tipStudija_id }}">
                                                Обнови годину
                                            </a>
                                        @elseif($godina->pokusaj > 1)
                                            <a class="btn btn-danger btn-sm"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obrisiObnovu?upisId={{ $godina->id }}"
                                               onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                                <span style="margin: 3px" class="fa fa-trash"></span>
                                            </a>
                                        @endif
                                        <a class="btn btn-warning"
                                           href="{{$putanja}}/student/{{ $godina->id }}/izmenaGodine">
                                            <div title="Измена">
                                                <span class="fa fa-edit"></span>
                                            </div>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
