@extends('layouts.layout')
@section('page_heading','Архива школарине')
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
        <hr>
        <div id="messages">
            @if (Session::get('flash-error'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Грешка!</strong>
                    @if(Session::get('flash-error') === 'update')
                        Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                    @elseif(Session::get('flash-error') === 'delete')
                        Дошло је до грешке при брисању података! Молимо вас покушајте поново.
                    @endif
                </div>
            @elseif(Session::get('flash-success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Успех!</strong>
                    @if(Session::get('flash-success') === 'update')
                        Подаци о школарини су успешно сачувани.
                    @elseif(Session::get('flash-success') === 'delete')
                        Подаци о школарини су успешно обрисани.
                    @endif
                </div>
            @endif
        </div>
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Школарине</h3>
            </div>
            <div class="panel-body">

                <div class="form-group">
                    <a href="{{$putanja}}/skolarina/dodavanje/{{$kandidat->id}}" class="btn btn-success">
                        <span class="fa fa-plus"></span> Нова школарина
                    </a>
                </div>

                <table class="table">
                    <thead>
                    <tr>
                        <th>Тип студија</th>
                        <th>Година студија</th>
                        <th>Износ</th>
                        <th>Број уплата</th>
                        <th>Преостало дуговање</th>
                        <th>Датум</th>
                        <th>Коментар</th>
                        <th>Измена</th>
                    </tr>
                    </thead>
                    <tbody>
                    @if(!empty($sveSkolarine))
                        @foreach($sveSkolarine as $index => $item)
                            <tr>
                                <td>{{$item->tipStudija->naziv}}</td>
                                <td>{{$item->godinaStudija->naziv}}</td>
                                <td>{{number_format($item->iznos, 2, ',', '.') . " RSD"}}</td>
                                <td>{{$item->uplate->count()}}</td>
                                <td>{{number_format(($item->iznos - $item->uplate->sum('iznos')), 2, ',', '.') . " RSD"}}</td>
                                <td>{{$item->updated_at->format('d.m.Y.')}}</td>
                                <td>{{$item->komentar}}</td>
                                <td>
                                    <a class="btn btn-primary"
                                       href="{{$putanja}}/skolarina/view/{{$item->id}}">
                                        <div title="Измена">
                                            <span class="fa fa-eye"></span>
                                        </div>
                                    </a>
                                    <a class="btn btn-warning"
                                       href="{{$putanja}}/skolarina/izmena/{{$item->id}}">
                                        <div title="Измена">
                                            <span class="fa fa-edit"></span>
                                        </div>
                                    </a>
                                    <a class="btn btn-danger"
                                       href="{{$putanja}}/skolarina/delete/{{$item->id}}"
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
    </div>
    <br>
    <br>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



