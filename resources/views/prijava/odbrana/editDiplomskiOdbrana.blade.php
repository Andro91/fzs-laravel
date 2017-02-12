@extends('layouts.layout')
@section('page_heading','Измена одбране дипломског рада')
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
        <div class="panel panel-info">
            <div class="panel-heading">
                <h3 class="panel-title">Измена одбране дипломског рада</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/prijava/updateDiplomskiOdbrana') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">
                    <input type="hidden" name="diplomskiTema_id" id="diplomskiTema_id" value="{{ $diplomskiRadTema->id }}">
                    <input type="hidden" name="diplomskiRadOdbrana_id" id="diplomskiRadOdbrana_id" value="{{ $diplomskiRadOdbrana->id }}">
                    <input type="hidden" name="tipStudija_id" id="tipStudija_id"
                           value="{{ $kandidat->tipStudija_id }}">
                    <input type="hidden" name="studijskiProgram_id" id="studijskiProgram_id"
                           value="{{ $kandidat->studijskiProgram_id }}">

                    <div class="row">
                        <div class="form-group col-lg-2">
                            <label for="brojIndeksa">Број Индекса</label>
                            <input type="text" value="{{$kandidat->brojIndeksa}}" class="form-control" disabled/>
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="imeKandidata">Име</label>
                            <input id="imeKandidata" class="form-control" type="text" name="imeKandidata"
                                   value="{{ $kandidat->imeKandidata . " " . $kandidat->imeRoditelja . " " . $kandidat->prezimeKandidata }}"
                                   disabled/>
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
                            <input id="StudijskiProgram" type="text" value="{{$kandidat->program->naziv}}"
                                   class="form-control" disabled/>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="predmet_id">Дипломски рад из предмета</label>
                            <select class="form-control" id="predmet_id" name="predmet_id">
                                @foreach($predmeti as $item)
                                    <option value="{{ $item->id }}" {{ ($diplomskiRadOdbrana->predmet_id == $item->id ? "selected":"") }}>
                                        {{ "Семестар " . $item->semestar . ': ' . $item->predmet->naziv }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10">
                            <label for="nazivTeme">Назив теме:</label>
                            <input id="nazivTeme" name="nazivTeme" type="text" class="form-control" value="{{$diplomskiRadOdbrana->nazivTeme}}">
                        </div>

                        <div class="form-group col-lg-4">
                            <label for="formatDatum">Датум пријаве</label>
                            <input id="formatDatum" class="form-control dateMask" type="text" name="formatDatum"
                                   value="{{ $diplomskiRadOdbrana->datumPrijave->format('d.m.Y.') }}"/>
                        </div>

                        <input type="hidden" name="datumPrijave" id="datum"
                               value="{{ $diplomskiRadOdbrana->datumPrijave->format('Y-m-d') }}">

                        <div class="form-group col-lg-4">
                            <label for="formatDatum2">Датум одбране (термин)</label>
                            <input id="formatDatum2" class="form-control dateMask" type="text" name="formatDatum2"
                                   value="{{ $diplomskiRadOdbrana->datumOdbrane->format('d.m.Y.') }}"/>
                        </div>

                        <input type="hidden" name="datumOdbrane" id="datum2"
                               value="{{ $diplomskiRadOdbrana->datumOdbrane->format('Y-m-d') }}">
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="profesor_id">Тему одобрио:</label>
                            <select class="form-control" id="temu_odobrio_profesor_id" name="temu_odobrio_profesor_id">
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}" {{ ($diplomskiRadOdbrana->temu_odobrio_profesor_id == $tip->id ? "selected":"") }}>{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="indikatorOdobreno" value="1" {{ ($diplomskiRadOdbrana->indikatorOdobreno == 1 ? "checked":"") }}>
                                    <b>Одбрана одобрена</b>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="profesor_id">Одбрану одобрио:</label>
                            <select class="form-control" id="odbranu_odobrio_profesor_id" name="odbranu_odobrio_profesor_id">
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}" {{ ($diplomskiRadOdbrana->odbranu_odobrio_profesor_id == $tip->id ? "selected":"") }} >{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-info btn-lg">
                            <i class="fa fa-save"></i> Сачувај
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

            var formatDatum2 = $("#formatDatum2");
            formatDatum2.datepicker({
                dateFormat: 'dd.mm.yy.',
                altField: "#datum2",
                altFormat: "yy-mm-dd"
            });

            formatDatum2.on('input', function () {
                var date = moment(formatDatum2.val(), "dd.mm.yy");
                $("#datum2").val(date.format('YYYY-MM-DD'));
            });


            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection