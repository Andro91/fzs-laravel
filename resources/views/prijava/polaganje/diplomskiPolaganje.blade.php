@extends('layouts.layout')
@section('page_heading','Пријава полагања дипломског рада')
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
        <div class="row">
            <a class="btn btn-primary" href="/prijava/zaStudenta/{{ $kandidat->id }}">Назад на студента</a>
        </div>
        <br>
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Пријава полагања дипломског рада</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/prijava/storeDiplomskiPolaganje') }}">
                    {{ csrf_field() }}
                    <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">
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

                        <input type="hidden" name="datum" id="datum"
                               value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                        <div class="form-group col-lg-4">
                            <label for="vreme">Време</label>
                            <input id="vreme" class="form-control timeMask" type="text" name="vreme"/>
                        </div>

                    </div>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="profesor_id">Тему одобрио (ментор):</label>
                            <select class="form-control" id="profesor_id" name="profesor_id">
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}">{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="rok_id">Испитни рок</label>
                            <select class="form-control" id="rok_id" name="rok_id">
                                @foreach($ispitniRok as $tip)
                                    <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="profesor_id_predsednik">Председник комисије:</label>
                            <select class="form-control" id="profesor_id_predsednik" name="profesor_id_predsednik">
                                <option value="0"></option>
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}">{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="profesor_id_clan">Члан комисије:</label>
                            <select class="form-control" id="profesor_id_clan" name="profesor_id_clan">
                                <option value="0"></option>
                                @foreach($profesor as $tip)
                                    <option value="{{$tip->id}}">{{$tip->zvanje . " " .$tip->ime . " " . $tip->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="brojBodova">Број бодова</label>
                            <input type="text" class="form-control brojBodova"
                                   id="brojBodova"
                                   name="brojBodova">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="ocena">Оцена</label>
                            <select id="ocena" class="form-control konacnaOcena"
                                    name="ocena">
                                <option value="0"></option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="konacnaOcenaSlovima">Оцена словима</label>
                            <select id="konacnaOcenaSlovima" class="form-control konacnaOcenaSlovima"
                                    name="konacnaOcenaSlovima" disabled>
                                <option value="0"></option>
                                <option value="5">пет</option>
                                <option value="6">шест</option>
                                <option value="7">седам</option>
                                <option value="8">осам</option>
                                <option value="9">девет</option>
                                <option value="10">десет</option>
                            </select>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <hr>
                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg"><span
                                    class="fa fa-save"></span> Сачувај
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
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
            $('.brojBodova').on('input', function (e) {
                var brojBodova = $(this).val();
                var ocena = 0;
                switch (true) {
                    case (brojBodova == 0):
                        ocena = 0;
                        break;
                    case (brojBodova <= 50):
                        ocena = 5;
                        break;
                    case (brojBodova >= 51 && brojBodova <= 60):
                        ocena = 6;
                        break;
                    case (brojBodova >= 61 && brojBodova <= 70):
                        ocena = 7;
                        break;
                    case (brojBodova >= 71 && brojBodova <= 80):
                        ocena = 8;
                        break;
                    case (brojBodova >= 81 && brojBodova <= 90):
                        ocena = 9;
                        break;
                    case (brojBodova >= 91 && brojBodova <= 100):
                        ocena = 10;
                        break;
                    default:
                        ocena = 0;
                        break;
                }
                $('.konacnaOcena').val(ocena);
                $('.konacnaOcenaSlovima').val(ocena);
            });

            $('.konacnaOcena').change(function () {
                $('.konacnaOcenaSlovima').val($('.konacnaOcena').val());
            });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection