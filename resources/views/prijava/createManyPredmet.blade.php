@extends('layouts.layout')
@section('page_heading','Пријава испита за више кандидата')
@section('section')
    <div class="col-lg-9">
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Пријава за полагање испита</h3>
            </div>
            <div class="panel-body">
                <form id="formaKandidatiOdabir" action="{{ $putanja }}/prijava/predmetVise" method="post">
                    {{ csrf_field() }}

                    <input type="hidden" name="predmet_id" id="predmet_id" value="{{ $predmet->id }}">

                    <div class="form-group" style="width: 50%;">
                        <label for="predmet_id">Пријављујем се за полагање испита из предмета</label>
                        <select class="form-control" id="predmet_id" name="predmet_id" disabled>
                            <option value="{{ $predmet->id }}">{{ $predmet->naziv }}</option>
                        </select>
                    </div>

                    {{--<div class="form-group pull-left" style="width: 40%;  margin-right: 2%">--}}
                        {{--<label for="tipPredmeta_id">Тип предмета:</label>--}}
                        {{--<select class="form-control" id="tipPredmeta_id" name="tipPredmeta_id" disabled>--}}
                            {{--@foreach($tipPredmeta as $tip)--}}
                                {{--<option value="{{$tip->id}}" {{ ($predmet->tipPredmeta_id == $tip->id ? "selected":"") }}>{{$tip->naziv}}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    {{--<div class="form-group pull-left" style="width: 10%; margin-right: 2%;">--}}
                        {{--<label for="godinaStudija_id">Година студија</label>--}}
                        {{--<select class="form-control" id="godinaStudija_id" name="godinaStudija_id" disabled>--}}
                            {{--@foreach($godinaStudija as $item)--}}
                                {{--<option value="{{ $item->id }}" {{ ($predmet->godinaStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>--}}
                            {{--@endforeach--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    {{--<div class="form-group pull-left" style="width: 40%;">--}}
                        {{--<label for="tipStudija_id">Тип студија:</label>--}}
                        {{--<select class="form-control" id="tipStudija_id" name="tipStudija_id" disabled>--}}
                            {{--<option value="{{$predmet->tipStudija_id}}">{{$predmet->tipStudija->naziv}}</option>--}}
                        {{--</select>--}}
                    {{--</div>--}}

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group" style="width: 80%;">
                        <label for="profesor_id">Професор</label>
                        <select class="form-control" id="profesor_id" name="profesor_id">
                            @foreach($profesor as $tip)
                                <option value="{{$tip->id}}">{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="rok_id">Испитни рок</label>
                            <select class="form-control" id="rok_id" name="rok_id">
                                @foreach($ispitniRok as $tip)
                                    <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="brojPolaganja">Ипит полажем (редни број полагања)</label>
                            <input id="brojPolaganja" class="form-control" type="text" name="brojPolaganja" value="1"/>
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="formatDatum">Датум</label>
                            <input id="formatDatum" class="form-control dateMask" type="text" name="formatDatum"
                                   value="{{ Carbon\Carbon::now()->format('d.m.Y.') }}"/>
                        </div>
                    </div>

                    <input type="hidden" name="datum" id="datum" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group col-lg-4">
                        <label for="rok_id">Студенти</label>
                        <select class="form-control auto-combobox" id="rok_id" name="rok_id">
                            @foreach($kandidati as $index => $kandidat)
                                <option value="{{$kandidat->id}}">{{$kandidat->brojIndeksa}}</option>
                            @endforeach
                        </select>
                    </div>

                    <input type="button" value="Додај" class="btn btn-lg btn-primary">

                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Име</th>
                            <th>Презиме</th>
                            <th>ЈМБГ</th>
                            <th>Година студија</th>
                        </tr>
                        </thead>
                        <tbody>
                        {{--@foreach($kandidati as $index => $kandidat)--}}
                            {{--<tr>--}}
                                {{--<td><input type="checkbox" id="odabir" name="odabir[{{ $index }}]"--}}
                                           {{--value="{{ $kandidat->id }}">--}}
                                {{--</td>--}}
                                {{--<td>{{$kandidat->imeKandidata}}</td>--}}
                                {{--<td>{{$kandidat->prezimeKandidata}}</td>--}}
                                {{--<td>{{$kandidat->jmbg}}</td>--}}
                                {{--<td>{{$kandidat->godinaStudija->nazivRimski}}</td>--}}
                            {{--</tr>--}}
                        {{--@endforeach--}}
                        </tbody>
                    </table>
                    <hr>
                    <div class="form-group text-center">
                        <input type="submit" value="Пријави студенте на испит" class="btn btn-lg btn-primary">
                    </div>
                </form>
            </div>
        </div>
    </div>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script>
        var forma = $('#formaKandidatiOdabir');

        $('#masovnaUplata').click(function () {
            forma.attr("action", "{{ $putanja }}/kandidat/masovnaUplata");
            forma.submit();
        });

        $('#masovniUpis').click(function () {
            forma.attr("action", "{{ $putanja }}/kandidat/masovniUpis");
            forma.submit();
        });

//        $(document).ready(function () {
//            $('#tabela').dataTable({
//                "aaSorting": [],
//                "columnDefs": [
//                    {"orderable": false, "targets": [0]}
//                ],
//                "oLanguage": {
//                    "sProcessing": "Процесирање у току...",
//                    "sLengthMenu": "Прикажи _MENU_ елемената",
//                    "sZeroRecords": "Није пронађен ниједан резултат",
//                    "sInfo": "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
//                    "sInfoEmpty": "Приказ 0 до 0 од укупно 0 елемената",
//                    "sInfoFiltered": "(филтрирано од укупно _MAX_ елемената)",
//                    "sInfoPostFix": "",
//                    "sSearch": "Претрага:",
//                    "sUrl": "",
//                    "oPaginate": {
//                        "sFirst": "Почетна",
//                        "sPrevious": "Претходна",
//                        "sNext": "Следећа",
//                        "sLast": "Последња"
//                    }
//                }
//            });
//        });
    </script>
@endsection
