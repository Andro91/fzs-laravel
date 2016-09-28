@extends('layouts.layout')
@section('page_heading','Преглед кандидата за мастер студије')
@section('section')
    <div class="col-lg-10">
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
                        Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио школарину
                        и покушајте поново.
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
        <form id="formaKandidatiOdabir" action="" method="post">
            {{ csrf_field() }}
            <table id="tabela" class="table">
                <thead>
                <th></th>
                <th>Име</th>
                <th>Презиме</th>
                <th>ЈМБГ</th>
                <th>Школарина</th>
                <th>Измена</th>
                </thead>
                <tbody>
                @foreach($kandidati as $index => $kandidat)
                    <tr>
                        <td><input type="checkbox" id="odabir" name="odabir[{{ $index }}]" value="{{ $kandidat->id }}">
                        </td>
                        <td>{{$kandidat->imeKandidata}}</td>
                        <td>{{$kandidat->prezimeKandidata}}</td>
                        <td>{{$kandidat->jmbg}}</td>
                        <td style="vertical-align: middle;">
                            <div class="text-left">
                                @if($kandidat->uplata == 1) <span class='label label-success'>Уплаћена</span>
                                @else <span class='label label-danger'>Није уплаћена</span>
                                @endif
                            </div>
                        </td>
                        <td>
                            <a class="btn btn-warning" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">
                                <div title="Измена">
                                    <span class="fa fa-edit"></span>
                                </div>
                            </a>
                            <a class="btn btn-danger" href="{{$putanja}}/master/{{ $kandidat->id }}/delete"
                               onclick="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');">
                                <div title="Брисање">
                                    <span class="fa fa-trash"></span>
                                </div>
                            </a>
                            <a class="btn btn-success btn-sm" href="{{$putanja}}/kandidat/{{ $kandidat->id }}/upis"
                                    {{ $kandidat->uplata ? '' : 'disabled=disabled' }}>Упис кандидата</a>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </form>
        <br/>
        <hr>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">За одабране кандидате</h3>
            </div>
            <div class="panel-body">
                <div id="masovnaUplata" class="btn btn-primary">Уплатили школарину</div>
                <div id="masovniUpis" class="btn btn-success">Изврши упис</div>
            </div>
        </div>
    </div>
    <script>
        var forma = $('#formaKandidatiOdabir');

        $('#masovnaUplata').click(function () {
            forma.attr("action", "{{ $putanja }}/master/masovnaUplata");
            forma.submit();
        });

        $('#masovniUpis').click(function () {
            forma.attr("action", "{{ $putanja }}/master/masovniUpis");
            forma.submit();
        });

        $(document).ready(function () {
            $('#tabela').dataTable({
                "aaSorting": [],
                "columnDefs": [
                    {"orderable": false, "targets": [0, 5]}
                ],
                "oLanguage": {
                    "sProcessing": "Процесирање у току...",
                    "sLengthMenu": "Прикажи _MENU_ елемената",
                    "sZeroRecords": "Није пронађен ниједан резултат",
                    "sInfo": "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
                    "sInfoEmpty": "Приказ 0 до 0 од укупно 0 елемената",
                    "sInfoFiltered": "(филтрирано од укупно _MAX_ елемената)",
                    "sInfoPostFix": "",
                    "sSearch": "Претрага:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Почетна",
                        "sPrevious": "Претходна",
                        "sNext": "Следећа",
                        "sLast": "Последња"
                    }
                }
            });
        });
    </script>
@endsection
