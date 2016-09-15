@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
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
        <div class="panel panel-warning">
            <div class="panel-heading">
                <h3 class="panel-title">Записник о полагању исппита</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/zapisnik/podaci') }}">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="rok_id">Испитни рок</label>
                            <select class="form-control" id="rok_id"
                                    name="rok_id" {{ empty($rok_id) ? '' : 'disabled' }}>
                                @if(!empty($aktivniIspitniRok))
                                    @foreach($aktivniIspitniRok as $tip)
                                        <option value="{{$tip->id}}" {{ (!empty($rok_id) && $rok_id == $tip->id) ? 'selected' : '' }}>{{$tip->naziv}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-5">
                            <label for="predmet_id">Предмет</label>
                            <select class="form-control auto-combobox" id="predmet_id"
                                    name="predmet_id" {{ empty($predmet_id) ? '' : 'disabled' }}>
                                @foreach($predmeti as $tip)
                                    <option value="{{$tip->id}}" {{ (!empty($predmet_id) && $predmet_id == $tip->id) ? 'selected' : '' }}>{{$tip->naziv}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group col-lg-1">
                            <label for="submitPredpodaci">&nbsp;</label><br>
                            <button type="submit" name="Submit" id="submitPredpodaci" class="btn btn-success"><span
                                        class="fa fa-check"></span></button>
                        </div>
                        <div class="form-group col-lg-1">
                            <label for="submitPredpodaci">&nbsp;</label><br>
                            <a href="{{$putanja}}/zapisnik/create" class="btn btn-danger"><span
                                        class="fa fa-close"></span></a>
                        </div>
                    </div>
                    <br>
                </form>
                <div class="clearfix"></div>
                <hr>
                <form role="form" method="post" action="{{$putanja}}/zapisnik/storeZapisnik">
                    {{ csrf_field() }}

                    <input type="hidden" id="predmet_id_forma" name="predmet_id"
                           value="{{ empty($predmet_id) ? $predmeti->first()->id : $predmet_id }}">
                    @if(!empty($aktivniIspitniRok))
                        <input type="hidden" id="rok_id_forma" name="rok_id"
                               value="{{ empty($rok_id) ? $aktivniIspitniRok->first()->id : $rok_id  }}">
                    @else
                        <input type="hidden" id="rok_id_forma" name="rok_id"
                               value="{{ empty($rok_id) ? '' : $rok_id  }}">
                    @endif
                    <input type="hidden" id="datum" name="datum" value="{{ Carbon\Carbon::now()->format('Y-m-d') }}">

                    <h2>Студенти који су пријавили испит у испитном року</h2>

                    <div class="clearfix"></div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="formatDatum">Датум</label>
                            <input type="text" id="formatDatum" name="formatDatum" class="form-control dateMask"
                                   value="{{ Carbon\Carbon::now()->format('d.m.Y.') }}">
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="vreme">Време</label>
                            <input type="text" id="vreme" name="vreme" class="form-control timeMask">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="ucionica">Учионица</label>
                            <input type="text" id="ucionica" name="ucionica" class="form-control">
                        </div>
                    </div>

                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th>Полагао</th>
                            <th>Име</th>
                            <th>Презиме</th>
                            <th>ЈМБГ</th>
                            <th>Број Индекса</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($studenti))
                            @foreach($studenti as $index => $kandidat)
                                <tr>
                                    <td><input type="checkbox" id="odabir" name="odabir[{{ $index }}]"
                                               value="{{ $kandidat->id }}"></td>
                                    <td>{{$kandidat->imeKandidata}}</td>
                                    <td>{{$kandidat->prezimeKandidata}}</td>
                                    <td>{{$kandidat->jmbg}}</td>
                                    <td>{{$kandidat->brojIndeksa}}</td>
                                    @if(!empty($prijavaIds))
                                        <input type="hidden" name="odabir2[{{ $kandidat->id }}]"
                                               value="{{$prijavaIds[$kandidat->id]}}">
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>

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
        $('#predmet_id').change(function () {
            $('#predmet_id_forma').val($('#predmet_id').val());
        });
        $('#rok_id').change(function () {
            $('#rok_id_forma').val($('#rok_id').val());
        });

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

    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection