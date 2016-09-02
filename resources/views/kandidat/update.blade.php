@extends('layouts.layout')
@section('page_heading',$kandidat->upisan == 0 ? "Измена података постојећег кандидата" : "Измена података активног студента")
@section('section')
    <form role="form" method="post" action="{{ url('/kandidat/' . $kandidat->id) }}">
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-6">

                    {{--GRESKE--}}
                    @if (Session::get('errors'))
                        <div class="alert alert-dismissable alert-danger">
                            <h4>Greška!</h4>
                            <ul>
                                @foreach (Session::get('errors')->all() as $error)
                                    <li>{!! $error !!}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (Session::get('jmbgError'))
                        <div class="alert alert-dismissable alert-danger">
                            <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Грешка!</h4>

                            <p>ЈМБГ већ постоји у систему.</p>

                            <p>{{ Session::get('status') }}</p>
                        </div>
                    @endif

                    {{ csrf_field() }}
                    <input type="hidden" name="_method" id="_method" value="put"/>

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Студијски програм</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="TipStudija">Тип студија</label>
                                <select class="form-control" id="TipStudija" name="TipStudija">
                                    @foreach($tipStudija as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->tipStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="StudijskiProgram">Студијски програм</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->studijskiProgram_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SkolskeGodineUpisa">Школска година:</label>
                                <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                    @foreach($skolskeGodineUpisa as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->skolskaGodinaUpisa_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($kandidat->upisan == 0)
                                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                    <label for="uplata">
                                        <input type="checkbox" id="uplata"
                                               name="uplata" {{ $kandidat->uplata ? "checked":"" }}>
                                        Уплата (да ли је кандидат платио школарину)</label>
                                </div>
                            @endif
                        </div>
                    </div>

                    {{--OSNOVNI PODACI--}}
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Основни подаци</h3>
                        </div>
                        <div class="panel-body">
                            @if(!empty($kandidat->brojIndeksa))
                                <div class="form-group">
                                    <label for="ImeKandidata">Број Индекса</label>
                                    <strong>{{ $kandidat->brojIndeksa }}</strong>
                                </div>
                            @endif
                            <div class="form-group">
                                <label for="ImeKandidata">Име кандидата</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata"
                                       value="{{ $kandidat->imeKandidata }}">
                            </div>
                            <div class="form-group">
                                <label for="PrezimeKandidata">Презиме кандидата</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata"
                                       value="{{ $kandidat->prezimeKandidata }}">
                            </div>

                            <div class="form-group">
                                <label for="JMBG">ЈМБГ</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG"
                                       value="{{ $kandidat->jmbg }}">
                            </div>
                            <div class="form-group">
                                <label for="DatumRodjenja">Датум рођења</label>
                                <input class="form-control" type="date" name="DatumRodjenja" id="DatumRodjenja"
                                       value="{{ date('d.m.Y.',strtotime($kandidat->datumRodjenja)) }}">
                            </div>

                            <div class="form-group">
                                <label for="MestoRodjenja">Место рођења</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja"
                                        style="max-width: 60%">
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->mestoRodjenja_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">Крсна слава</label>
                                <select class="form-control" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->krsnaSlava_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Контакт телефон</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon"
                                       style="max-width: 40%" value="{{ $kandidat->kontaktTelefon }}">
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Адреса становања</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja"
                                       style="max-width: 80%" value="{{ $kandidat->adresaStanovanja }}">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%"
                                       value="{{ $kandidat->email }}">
                            </div>
                            <div class="form-group" style="width: 80%;">
                                <label for="ImePrezimeJednogRoditelja">Име и презиме једног родитеља</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja"
                                       value="{{ $kandidat->imePrezimeJednogRoditelja }}">
                            </div>
                            <div class="form-group" style="width: 80%;">
                                <label for="KontaktTelefonRoditelja">контакт телефон родитеља</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja" value="{{ $kandidat->kontaktTelefonRoditelja }}">
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                                <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                       id="NazivSkoleFakulteta"
                                       value="{{ $kandidat->srednjeSkoleFakulteti }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta"
                                       value="{{ $kandidat->smerZavrseneSkoleFakulteta }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->mestoZavrseneSkoleFakulteta_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="GodinaStudija">Година студија</label>
                                <select class="form-control" id="GodinaStudija" name="GodinaStudija"
                                        style="max-width: 40%">
                                    @foreach($godinaStudija as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->godinaStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="col-sm-12 col-lg-6">
                    <div class="row">
                        <div class="col-lg-12">

                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Само за прву годину</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="prviRazred">1. разред</label>
                                        <select class="form-control" id="prviRazred" name="prviRazred" tabindex="-1">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($prviRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena1">Средња оцена</label>
                                        <input class="form-control" type="text" name="SrednjaOcena1" id="SrednjaOcena1"
                                               value="{{ number_format((float)$prviRazred->srednja_ocena, 2, '.', '') }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="drugiRazred">2. разред</label>
                                        <select class="form-control" id="drugiRazred" name="drugiRazred" tabindex="-1">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($drugiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena2">Средња оцена</label>
                                        <input class="form-control" type="text" name="SrednjaOcena2" id="SrednjaOcena2"
                                               value="{{ number_format((float)$drugiRazred->srednja_ocena, 2, '.', '') }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="treciRazred">3. разред</label>
                                        <select class="form-control" id="treciRazred" name="treciRazred" tabindex="-1">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($treciRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena3">Средња оцена</label>
                                        <input class="form-control" type="text" name="SrednjaOcena3" id="SrednjaOcena3"
                                               value="{{ number_format((float)$treciRazred->srednja_ocena, 2, '.', '') }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="cetvrtiRazred">4. разред</label>
                                        <select class="form-control" id="cetvrtiRazred" name="cetvrtiRazred"
                                                tabindex="-1">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($cetvrtiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena4">Средња оцена</label>
                                        <input class="form-control" type="text" name="SrednjaOcena4" id="SrednjaOcena4"
                                               value="{{ number_format((float)$cetvrtiRazred->srednja_ocena, 2, '.', '') }}">
                                    </div>

                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="OpstiUspehSrednjaSkola">Општи успех средња школа
                                            &nbsp;&nbsp;</label>
                                        <select class="form-control" id="OpstiUspehSrednjaSkola"
                                                name="OpstiUspehSrednjaSkola" tabindex="-1">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($kandidat->opstiUspehSrednjaSkola_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcenaSrednjaSkola">Средња оцена средња школа</label>
                                        <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                               id="SrednjaOcenaSrednjaSkola"
                                               value="{{ $kandidat->srednjaOcenaSrednjaSkola }}">
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Спортско ангаажовање</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Спорт</th>
                                            <th><a class="btn btn-primary"
                                                   href="{{ $putanja }}/kandidat/{{ $kandidat->id }}/sportskoangazovanje">Додај</a>
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($sportskoAngazovanjeKandidata as $angazovanje)
                                            <tr>
                                                <td>{{ $sport->find($angazovanje->sport_id)->naziv  }}</td>
                                                <td></td>
                                            </tr>
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Висина и тежина</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="VisinaKandidata">Висина кандидата (cm)</label>
                                        <input class="form-control" type="text" name="VisinaKandidata"
                                               id="VisinaKandidata"
                                               value="{{ $kandidat->visina }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="TelesnaTezinaKandidata">Телесна тежина кандидата (kg)</label>
                                        <input class="form-control" type="text" name="TelesnaTezinaKandidata"
                                               id="TelesnaTezinaKandidata" value="{{ $kandidat->telesnaTezina }}">
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default pull-left" style="width: 50%;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ДОКУМЕНТА - ѕа упис на I ГОДИНУ СТУДИЈА</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach($dokumentiPrvaGodina as $i=>$dokument)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="dokumentiPrva[{{ $i }}]"
                                                       value="{{$dokument->id}}"
                                                        {{ (in_array($dokument->id,$prilozenaDokumenta) ? "checked":"") }}>
                                                {{ $dokument->naziv }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-default pull-left" style="width: 50%;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ДОКУМЕНТА - ѕа упис на II, III и IV ГОДИНУ СТУДИЈА и
                                        прелазак
                                        са другог факултета</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach($dokumentiOstaleGodine as $i=>$dokument)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="dokumentiDruga[{{ $i }}]"
                                                       value="{{$dokument->id}}"
                                                        {{ (in_array($dokument->id,$prilozenaDokumenta) ? "checked":"") }}>
                                                {{ $dokument->naziv }}
                                            </label>
                                        </div>
                                    @endforeach
                                </div>
                            </div>

                            <div class="panel panel-info pull-left" style="width: 100%;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Остало</h3>
                                </div>
                                <div class="panel-body">
                                    {{--<div class="form-group">--}}
                                    {{--<label for="StatusaUpisaKandidata">Status Upisa Kandidata:</label>--}}
                                    {{--<select class="form-control" id="StatusaUpisaKandidata" name="StatusaUpisaKandidata">--}}
                                    {{--@foreach($statusaUpisaKandidata as $item)--}}
                                    {{--<option value="{{$item->id}}">{{$item->naziv}}</option>--}}
                                    {{--@endforeach--}}
                                    {{--</select>--}}
                                    {{--</div>--}}
                                    <div class="form-group">
                                        <label for="BrojBodovaTest">Број бодова тест</label>
                                        <input class="form-control" type="text" name="BrojBodovaTest"
                                               id="BrojBodovaTest" value="{{ $kandidat->brojBodovaTest }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="BrojBodovaSkola">Број бодова школа</label>
                                        <input class="form-control" type="text" name="BrojBodovaSkola"
                                               id="BrojBodovaSkola" value="{{ $kandidat->brojBodovaSkola }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="ukupniBrojBodova">Укупни број бодова</label>
                                        <input class="form-control" type="text" name="ukupniBrojBodova"
                                               id="ukupniBrojBodova" value="{{ $kandidat->ukupniBrojBodova }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="UpisniRok">Уписни рок</label>
                                        <input class="form-control" type="text" name="UpisniRok" id="UpisniRok"
                                               value="{{ $kandidat->upisniRok }}">
                                    </div>

                                    <div class="form-group pull-left" style="width: 48%;">
                                        <a class="btn btn-primary"
                                           href="{{$putanja}}/izvestaji/potvrdeStudent/{{$kandidat->id}}">
                                            Потврде
                                        </a>
                                    </div>

                                    {{--<div class="form-group">--}}
                                    {{--<label for="IndikatorAktivan">Indikator Aktivan</label>--}}
                                    {{--<input class="form-control" type="text" name="IndikatorAktivan" id="IndikatorAktivan">--}}
                                    {{--</div>--}}
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-sm-12 col-lg-12" style="margin-bottom: 5%">
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Сачувај</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group text-center">
                                <button type="submit" class="btn btn-success btn-lg">Сачувај</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="{{ $putanja }}/js/kandidat-create-part-2.js"></script>
    <script>
        //        $.mask.definitions['q'] = '[0-3]';
        //        $.mask.definitions['w'] = '[0-9]';
        //        $.mask.definitions['e'] = '[0-1]';
        //        $('#DatumRodjenja').mask("qw.ew.9999.");
        //
        //        $.mask.definitions['r'] = '[0-5]';
        //        $.mask.definitions['t'] = '[0-9]';

        // $('#SrednjaOcena1').mask("r.tt");
        // $('#SrednjaOcena2').mask("r.tt");
        // $('#SrednjaOcena3').mask("r.tt");
        // $('#SrednjaOcena4').mask("r.tt");
        // $('#SrednjaOcenaSrednjaSkola').mask("r.tt");

    </script>
@endsection
