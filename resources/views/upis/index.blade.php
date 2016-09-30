@extends('layouts.layout')
@section('page_heading',"Статус студента")
@section('section')
    <div class="col-lg-12">
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <form action="{{$putanja}}/student/{{ $kandidat->id }}/upisMasterStudija">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
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
                <a href="/student/{{ $kandidat->id }}/status/4" class="btn btn-warning">Замрзни годину</a>
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
                    @if(!empty($masterStudije))
                        <h4>Мастер студије</h4>
                        <table class="table">
                            <thead>
                            <tr>
                                <th>Година</th>
                                <th>Школарина</th>
                                <th>Уписан</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($masterStudije as $godina)
                                <tr @if($godina->pokusaj > 1) class="warning" @else class="info" @endif>
                                    <td>{{ $godina->godina }}</td>
                                    <td>
                                        @if($godina->skolarina == 1)
                                            <span class='label label-success'>Уплаћена</span>
                                        @else
                                            <span class='label label-danger'>Није уплаћена</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($godina->upisan == 1)
                                            <span class='label label-success'>Уписан</span>
                                        @else
                                            <span class='label label-danger'>Није уписан</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($godina->skolarina == 1)
                                            <a class="btn btn-danger"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUplatu?upisId={{ $godina->id }}">
                                                <i class="fa fa-ban"></i> Поништи уплату
                                            </a>
                                        @else
                                            <a class="btn btn-primary"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/uplataSkolarine?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уплатиo
                                                школарину
                                            </a>
                                        @endif

                                        @if($godina->upisan == 1)
                                            <a class="btn btn-danger"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUpis?upisId={{ $godina->id }}">
                                                <i class="fa fa-ban"></i> Поништи упис
                                            </a>
                                        @else
                                            <a class="btn btn-success"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/upisiStudenta?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уписао
                                                годину
                                            </a>
                                        @endif

                                        @if($godina->pokusaj == 1)
                                            <a class="btn btn-info"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obnova?godina={{ $godina->godina }}&tipStudijaId={{ $godina->tipStudija_id }}">
                                                Обнови годину
                                            </a>
                                        @elseif($godina->pokusaj > 1)
                                            <a class="btn btn-danger"
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obrisiObnovu?upisId={{ $godina->id }}"
                                               onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                                <span style="margin: 3px" class="fa fa-trash"></span>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    @endif
                    <h4>Основне студије</h4>
                    <table class="table">
                        <thead>
                        <tr>
                            <th>Година</th>
                            <th>Покушај</th>
                            <th>Школарина</th>
                            <th>Уписан</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($osnovneStudije as $godina)
                            <tr @if($godina->pokusaj > 1) class="warning" @else class="info" @endif>
                                <td>{{ $godina->godina }}</td>
                                <td>{{ $godina->pokusaj }}</td>
                                <td>
                                    @if($godina->skolarina == 1)
                                        <span class='label label-success'>Уплаћена</span>
                                    @else
                                        <span class='label label-danger'>Није уплаћена</span>
                                    @endif
                                </td>
                                <td>
                                    @if($godina->upisan == 1)
                                        <span class='label label-success'>Уписан</span>
                                    @else
                                        <span class='label label-danger'>Није уписан</span>
                                    @endif
                                </td>
                                <td>
                                    @if($godina->skolarina == 1)
                                        <a class="btn btn-danger"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUplatu?upisId={{ $godina->id }}">
                                            <i class="fa fa-ban"></i> Поништи уплату
                                        </a>
                                    @else
                                        <a class="btn btn-primary"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/uplataSkolarine?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уплатиo
                                            школарину
                                        </a>
                                    @endif

                                    @if($godina->upisan == 1)
                                        <a class="btn btn-danger"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/ponistiUpis?upisId={{ $godina->id }}">
                                            <i class="fa fa-ban"></i> Поништи упис
                                        </a>
                                    @else
                                        <a class="btn btn-success"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/upisiStudenta?godina={{ $godina->godina }}&pokusaj={{ $godina->pokusaj }}">Уписао
                                            годину
                                        </a>
                                    @endif

                                    @if($godina->pokusaj == 1)
                                        <a class="btn btn-info"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/obnova?godina={{ $godina->godina }}&tipStudijaId={{ $godina->tipStudija_id }}">
                                            Обнови годину
                                        </a>
                                    @elseif($godina->pokusaj > 1)
                                        <a class="btn btn-danger"
                                           href="{{$putanja}}/student/{{ $kandidat->id }}/obrisiObnovu?upisId={{ $godina->id }}"
                                           onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                            <span style="margin: 3px" class="fa fa-trash"></span>
                                        </a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
