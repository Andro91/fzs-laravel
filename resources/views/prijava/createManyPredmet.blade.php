@extends('layouts.layout')
@section('page_heading','Пријава испита за више кандидата')
@section('section')
    <div class="col-lg-9">
        <div id="messages">
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
                        <select class="form-control auto-combobox" id="profesor_id" name="profesor_id">
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

                        {{--<div class="form-group col-lg-4">--}}
                            {{--<label for="brojPolaganja">Ипит полажем (редни број полагања)</label>--}}
                            {{--<input id="brojPolaganja" class="form-control" type="text" name="brojPolaganja" value="1"/>--}}
                        {{--</div>--}}

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
                        <label for="addStudentList">Студенти</label>
                        <select class="form-control auto-combobox" id="addStudentList" name="addStudentList">
                            <option value="0"></option>
                            @foreach($kandidati as $index => $kandidat)
                                <option value="{{$kandidat->id}}">{{$kandidat->brojIndeksa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group col-lg-1">
                        <label for="addStudentButton">&nbsp;</label>
                        <input type="button" value="Додај" name="button" id="addStudentButton" class="btn btn-success">
                    </div>
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Број индекса</th>
                            <th>Име и презиме</th>
                            <th>Година студија</th>
                        </tr>
                        </thead>
                        <tbody id="addStudentTableBody">
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
        $(document).ready(function () {
            var forma = $('#formaKandidatiOdabir');

            $('#masovnaUplata').click(function () {
                forma.attr("action", "{{ $putanja }}/kandidat/masovnaUplata");
                forma.submit();
            });

            $('#masovniUpis').click(function () {
                forma.attr("action", "{{ $putanja }}/kandidat/masovniUpis");
                forma.submit();
            });

            $('#addStudentButton').click(function () {
                addStudentToList();
            });

            $("div.form-group:nth-child(13) > span:nth-child(3) > input:nth-child(1)").keypress(function(e){
                var k=e.keyCode || e.which;
                if(k==13){
                    e.preventDefault();
                    addStudentToList();
                }
            });

            $(window).keypress(function(event){
                if(event.keyCode == 13) {
                    event.preventDefault();
                }
            });

            function addStudentToList(){
                $.ajax({
                    url: '{{$putanja}}/prijava/vratiKandidataPoBroju',
                    type: 'post',
                    data: {
                        id: $('#addStudentList').val(),
                        _token: $('input[name=_token]').val()
                    },
                    success: function (result) {
                        $("#tabela tr:last").after(result);
                        $("div.form-group:nth-child(13) > span:nth-child(3) > input:nth-child(1)").val("");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
        });
    </script>
@endsection
