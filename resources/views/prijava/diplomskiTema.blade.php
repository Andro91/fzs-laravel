@extends('layouts.layout')
@section('page_heading','Пријава теме дипломског рада')
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
                <h3 class="panel-title">Пријава теме дипломског рада</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/prijava/') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">
                    <input type="hidden" name="tipStudija_id" id="tipStudija_id"
                           value="{{ $kandidat->tipStudija_id }}">
                    <input type="hidden" name="studijskiProgram_id" id="studijskiProgram_id"
                           value="{{ $kandidat->studijskiProgram_id }}">

                    <div class="row">
                        <div class="form-group col-lg-2" >
                            <label for="brojIndeksa">Број Индекса</label>
                            <input type="text" value="{{$kandidat->brojIndeksa}}" class="form-control" disabled/>
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="imeKandidata">Име</label>
                            <input id="imeKandidata" class="form-control" type="text" name="imeKandidata"
                                   value="{{ $kandidat->imeKandidata . " " . $kandidat->imeRoditelja . " " . $kandidat->prezimeKandidata }}" disabled/>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="jmbg">ЈМБГ</label>
                            <input id="jmbg" class="form-control" type="text" name="jmbg"
                                   value="{{ $kandidat->jmbg }}" disabled/>
                        </div>

                        <div class="form-group col-lg-6">
                            <label for="StudijskiProgram">Студијски програм</label>
                            <input id="StudijskiProgram" type="text" value="{{$kandidat->program->naziv}}" class="form-control" disabled/>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="predmet_id">Дипломски рад из предмета</label>
                            <select class="form-control" id="predmet_id" name="predmet_id">
                                @foreach($predmeti as $item)
                                    <option value="{{ $item->id }}">{{ "Семестар " . $item->semestar . ': ' . $item->predmet->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10">
                            <label for="nazivTeme">Назив теме:</label>
                            <input id="nazivTeme" name="nazivTeme" type="text" class="form-control">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="formatDatum">Датум</label>
                            <input id="formatDatum" class="form-control dateMask" type="text" name="formatDatum"
                                   value="{{ Carbon\Carbon::now()->format('d.m.Y.') }}"/>
                        </div>

                        <input type="hidden" name="datum" id="datum" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="profesor_id">Тему одобрио:</label>
                            <select class="form-control" id="profesor_id" name="profesor_id">
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}">{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-success btn-lg"><span
                                    class="fa fa-save"></span> Сачувај
                        </button>
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
    <br>
    <script>
        $(function () {
            var formatDatum = $("#formatDatum");
            formatDatum.datepicker({
                dateFormat: 'dd.mm.yy.',
                altField: "#datum",
                altFormat: "yy-mm-dd"
            });

            formatDatum.on('input', function () {
                var date = moment(formatDatum.val(), "dd.mm.yy");
                $("#datum").val(date.format('YYYY-MM-DD'));
            });


            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });

        $(document).ready(function () {
            var pathname = window.location.pathname;
            $('#asdasd').click(function () {
                $.ajax({
                    url: '{{$putanja}}/prijava/vratiKandidataPrijava',
                    type: 'post',
                    data: {
                        id: $('#brojIndeksa').val(),
                        _token: $('input[name=_token]').val()
                    },
                    success: function (result) {
                        //Azuriranje Studenta
                        $('#kandidat_id').val(result['student'].id);
                        $('#jmbg').val(result['student'].jmbg);
                        $('#imeKandidata').val(result['student'].imeKandidata);
                        $('#prezimeKandidata').val(result['student'].prezimeKandidata);
                        $('#studijskiProgram_id').val(result['student'].studijskiProgram_id);

                        //Azuriranje Liste Predmeta
                        if (pathname.indexOf('/prijava/predmet/') == -1) {
                            $('#predmet_id').html(result['predmeti']);
                        }
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });

            $('#predmet_id').change(function () {
                $.ajax({
                    url: '{{$putanja}}/prijava/vratiPredmetPrijava',
                    type: 'post',
                    data: {
                        id: $('#predmet_id').val(),
                        kandidat: $('#kandidat_id').val(),
                        _token: $('input[name=_token]').val()
                    },
                    success: function (result) {
                        $('#tipPredmeta_id').val(result['tipPredmeta']);
                        $('#godinaStudija_id').val(result['godinaStudija']);
                        $('#tipStudija_id').val(result['tipStudija']);
                        $('#profesor_id').html(result['profesori']);
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection