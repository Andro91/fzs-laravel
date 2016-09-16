@extends('layouts.layout')
@section('page_heading',"Статус студента")
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
                <li class="list-group-item">Име и презиме:
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
            </div>
        </div>
        <div>
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Година студија</h3>
                </div>
                <div class="panel-body">
                    @foreach($upisaneGodine as $godina)
                        @if($godina->godina == 1 && $godina->pokusaj == 1)
                            <h4>Прва Година</h4>
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
                        @endif
                        @if($godina->godina == 2 && $godina->pokusaj == 1)
                                </tbody>
                            </table>
                            <h4>Друга Година</h4>
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
                        @endif
                        @if($godina->godina == 3 && $godina->pokusaj == 1)
                                </tbody>
                            </table>
                            <h4>Трећа Година</h4>
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
                        @endif
                        @if($godina->godina == 4 && $godina->pokusaj == 1)
                                </tbody>
                            </table>
                            <h4>Четврта Година</h4>
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
                        @endif
                                <tr class="info">
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
                                               href="{{$putanja}}/student/{{ $kandidat->id }}/obnova?godina={{ $godina->godina }}">
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
