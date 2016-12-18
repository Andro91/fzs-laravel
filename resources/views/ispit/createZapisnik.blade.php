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
        <div class="panel panel-primary">
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
                            <select class="form-control {{ empty($predmet_id) ? 'auto-combobox' : '' }}" id="predmet_id"
                                    name="predmet_id" {{ empty($predmet_id) ? '' : 'disabled' }}>
                                @foreach($predmeti as $item)
                                    <option value="{{$item->id}}" {{ (!empty($predmet_id) && $predmet_id == $item->id) ? 'selected' : '' }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="submitPredpodaci">&nbsp;</label><br>
                            @if(empty($predmet_id))
                                <button type="submit" name="Submit" id="submitPredpodaci" class="btn btn-success"><span
                                            class="fa fa-check" style="margin: 3px"></span></button>
                            @else
                                <a href="{{$putanja}}/zapisnik/create" class="btn btn-danger"><span
                                            class="fa fa-close" style="margin: 3px"></span></a>
                            @endif
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="profesor_id">Професор</label>
                            <select class="form-control auto-combobox" id="profesor_id"
                                    name="profesor_id">
                                @foreach($profesori as $item)
                                    <option value="{{$item->id}}">{{ $item->ime . " " . $item->prezime }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-2">
                            <label for="ajaxSubmitPrijava">&nbsp;</label><br>
                            <input type="button" id="ajaxSubmitPrijava" class="btn btn-success" value="Прикажи студенте">
                        </div>
                    </div>

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

                    <h3>Студенти који су пријавили испит у испитном року</h3>

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
                            <th>Број Индекса</th>
                            <th>Име и презиме</th>
                            <th>ЈМБГ</th>
                        </tr>
                        </thead>
                        <tbody>
                        @if(!empty($studenti))
                            @foreach($studenti as $index => $kandidat)
                                <tr>
                                    <td><input type="checkbox" id="odabir" name="odabir[{{ $index }}]"
                                               value="{{ $kandidat->id }}"></td>
                                    <td>{{$kandidat->brojIndeksa}}</td>
                                    <td>{{$kandidat->imeKandidata . " " . $kandidat->prezimeKandidata }}</td>
                                    <td>{{$kandidat->jmbg}}</td>
                                    @if(!empty($prijavaIds))
                                        <input type="hidden" name="odabir2[{{ $kandidat->id }}]"
                                               value="{{$prijavaIds[$kandidat->id]}}">
                                    @endif
                                </tr>
                            @endforeach
                        @endif
                        </tbody>
                    </table>
                    @if(!empty($predmet_id))
                        <div class="form-group">
                            <a class="btn btn-primary" href="/prijava/zaPredmet/{{ $predmet_id }}">Додај студента</a>
                        </div>
                    @endif
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
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <script>
        $('#rok_id').change(function () {
            var rok = $('#rok_id');
            $.ajax({
                url: '/zapisnik/vratiZapisnikPredmet',
                method: 'get',
                data: {
                    rokId: rok.val()
                },
                success: function (result) {
                    var selectList = $('#predmet_id');
                    $('div.col-lg-5:nth-child(2) > span:nth-child(3) > input:nth-child(1)').val('');
                    selectList.html('');
                    $.each(result['predmeti'], function () {
                        selectList.append($("<option />").val(this.id).text(this.naziv));
                    });
                    selectList = $('#profesor_id');
                    selectList.html('');
                    $('div.row:nth-child(3) > div:nth-child(1) > span:nth-child(3) > input:nth-child(1)').val('');
                    $.each(result['profesori'], function () {
                        selectList.append($("<option />").val(this.id).text(this.ime + ' ' + this.prezime));
                    });
                }
            });
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