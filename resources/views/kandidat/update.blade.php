@extends('layouts.layout')
@section('page_heading','Izmena podataka postojećeg kandidata')
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
                            <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Greška!</h4>

                            <p>JMBG vec postoji u sistemu. Pokusajte da nadjete kandidata u postojecim.</p>

                            <p>{{ Session::get('status') }}</p>
                        </div>
                    @endif


                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1"/>
                    <input type="hidden" name="_method" id="_method" value="put"/>

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Studijski program</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="TipStudija">TipStudija:</label>
                                <select class="form-control" id="TipStudija" name="TipStudija">
                                    @foreach($tipStudija as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->tipStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="StudijskiProgram">Studijski Program:</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->studijskiProgram_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SkolskeGodineUpisa">Skolska Godina:</label>
                                <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                    @foreach($skolskeGodineUpisa as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->skolskaGodinaUpisa_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    {{--OSNOVNI PODACI--}}
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Osnovni podaci</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="ImeKandidata">Ime Kandidata</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata"
                                       value="{{ $kandidat->imeKandidata }}">
                            </div>
                            <div class="form-group">
                                <label for="PrezimeKandidata">Prezime Kandidata</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata"
                                       value="{{ $kandidat->prezimeKandidata }}">
                            </div>

                            <div class="form-group">
                                <label for="JMBG">JMBG</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG"
                                       value="{{ $kandidat->jmbg }}">
                            </div>
                            <div class="form-group">
                                <label for="DatumRodjenja">Datum Rodjenja</label>
                                <input class="form-control" type="date" name="DatumRodjenja" id="DatumRodjenja"
                                       value="{{ date('d.m.Y.',strtotime($kandidat->datumRodjenja)) }}">
                            </div>

                            <div class="form-group">
                                <label for="MestoRodjenja">MestoRodjenja:</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja"
                                        style="max-width: 60%">
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->mestoRodjenja_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">KrsnaSlava:</label>
                                <select class="form-control" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->krsnaSlava_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Kontakt Telefon</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon"
                                       style="max-width: 40%" value="{{ $kandidat->kontaktTelefon }}">
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Adresa Stanovanja</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja"
                                       style="max-width: 80%" value="{{ $kandidat->adresaStanovanja }}">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%"
                                       value="{{ $kandidat->email }}">
                            </div>
                            <div class="form-group" style="width: 80%;">
                                <label for="ImePrezimeJednogRoditelja">Ime i Prezime Jednog Roditelja</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja"
                                       value="{{ $kandidat->imePrezimeJednogRoditelja }}">
                            </div>
                            <div class="form-group" style="width: 80%;">
                                <label for="KontaktTelefonRoditelja">Kontakt Telefon Roditelja</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja" value="{{ $kandidat->kontaktTelefonRoditelja }}">
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Naziv Skole ili Fakulteta:</label>
                                <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->srednjeSkoleFakulteti_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="SmerZavrseneSkoleFakulteta">Smer Zavrsene Skole ili Fakulteta</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta"
                                       value="{{ $kandidat->smerZavrseneSkoleFakulteta }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Mesto Zavrsene Skole ili Fakulteta:</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->mestoZavrseneSkoleFakulteta_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="GodinaStudija">Godina Studija:</label>
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


                <div class="col-sm-12 col-lg-6" style="margin-bottom: 5%">
                    <div class="row">
                        <div class="col-lg-8">

                            <div class="panel panel-warning">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Samo za prvu godinu</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="prviRazred">1. razred</label>
                                        <select class="form-control" id="prviRazred" name="prviRazred">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($prviRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena1">Srednja Ocena</label>
                                        <input class="form-control" type="text" name="SrednjaOcena1" id="SrednjaOcena1"
                                               value="{{ $prviRazred->srednja_ocena }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="drugiRazred">2. razred</label>
                                        <select class="form-control" id="drugiRazred" name="drugiRazred">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($drugiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena2">Srednja Ocena</label>
                                        <input class="form-control" type="text" name="SrednjaOcena2" id="SrednjaOcena2"
                                               value="{{ $drugiRazred->srednja_ocena }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="treciRazred">3. razred</label>
                                        <select class="form-control" id="treciRazred" name="treciRazred">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($treciRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena3">Srednja Ocena</label>
                                        <input class="form-control" type="text" name="SrednjaOcena3" id="SrednjaOcena3"
                                               value="{{ $treciRazred->srednja_ocena }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="cetvrtiRazred">4. razred</label>
                                        <select class="form-control" id="cetvrtiRazred" name="cetvrtiRazred">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($cetvrtiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcena4">Srednja Ocena</label>
                                        <input class="form-control" type="text" name="SrednjaOcena4" id="SrednjaOcena4"
                                               value="{{ $cetvrtiRazred->srednja_ocena }}">
                                    </div>

                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="OpstiUspehSrednjaSkola">Opšti Uspeh Srednja Škola &nbsp;&nbsp;</label>
                                        <select class="form-control" id="OpstiUspehSrednjaSkola"
                                                name="OpstiUspehSrednjaSkola">
                                            @foreach($opstiUspehSrednjaSkola as $item)
                                                <option value="{{ $item->id }}" {{ ($kandidat->opstiUspehSrednjaSkola_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="SrednjaOcenaSrednjaSkola">Srednja Ocena Srednja Škola</label>
                                        <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                               id="SrednjaOcenaSrednjaSkola"
                                               value="{{ $kandidat->srednjaOcenaSrednjaSkola }}">
                                    </div>
                                </div>
                            </div>

                            <div class="panel panel-primary">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Sportsko angažovanje</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-condensed">
                                        <thead>
                                        <tr>
                                            <th>Sport</th>
                                            <th><a class="btn btn-primary" href="/kandidat/{{ $kandidat->id }}/sportskoangazovanje">Dodaj</a></th>
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
                                    <h3 class="panel-title">Visina i Težina</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                        <label for="VisinaKandidata">Visina Kandidata</label>
                                        <input class="form-control" type="text" name="VisinaKandidata"
                                               id="VisinaKandidata"
                                               value="{{ $kandidat->visina }}">
                                    </div>
                                    <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                        <label for="TelesnaTezinaKandidata">Telesna Težina Kandidata</label>
                                        <input class="form-control" type="text" name="TelesnaTezinaKandidata"
                                               id="TelesnaTezinaKandidata" value="{{ $kandidat->telesnaTezina }}">
                                    </div>
                                </div>
                            </div>


                            <div class="panel panel-default pull-left" style="width: 50%;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">DOKUMENTA - za upis na I GODINU STUDIJA</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach($dokumentiPrvaGodina as $dokument)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="{{ $dokument->naziv }}"
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
                                    <h3 class="panel-title">DOKUMENTA - za upis na II, III, IV GODINU STUDIJA i prelazak
                                        sa
                                        drugog fakulteta</h3>
                                </div>
                                <div class="panel-body">
                                    @foreach($dokumentiOstaleGodine as $dokument)
                                        <div class="checkbox">
                                            <label>
                                                <input type="checkbox" name="{{ $dokument->naziv }}"
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
                                    <h3 class="panel-title">Ostalo</h3>
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
                                        <label for="BrojBodovaTest">Broj Bodova Test</label>
                                        <input class="form-control" type="text" name="BrojBodovaTest"
                                               id="BrojBodovaTest" value="{{ $kandidat->brojBodovaTest }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="BrojBodovaSkola">Broj Bodova Skola</label>
                                        <input class="form-control" type="text" name="BrojBodovaSkola"
                                               id="BrojBodovaSkola" value="{{ $kandidat->brojBodovaSkola }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="UpisniRok">Upisni Rok</label>
                                        <input class="form-control" type="text" name="UpisniRok" id="UpisniRok"
                                               value="{{ $kandidat->upisniRok }}">
                                    </div>
                                    {{--<div class="form-group">--}}
                                    {{--<label for="IndikatorAktivan">Indikator Aktivan</label>--}}
                                    {{--<input class="form-control" type="text" name="IndikatorAktivan" id="IndikatorAktivan">--}}
                                    {{--</div>--}}
                                </div>
                                <div class="form-group text-center">
                                    <button type="submit" class="btn btn-success btn-lg">Sačuvaj</button>
                                </div>

                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </form>

    <script>
        $.mask.definitions['q'] = '[0-3]';
        $.mask.definitions['w'] = '[0-9]';
        $.mask.definitions['e'] = '[0-1]';
        $('#DatumRodjenja').mask("qw.ew.9999.");

        $.mask.definitions['r'] = '[0-5]';
        $.mask.definitions['t'] = '[0-9]';

        $('#SrednjaOcena1').mask("r.tt");
        $('#SrednjaOcena2').mask("r.tt");
        $('#SrednjaOcena3').mask("r.tt");
        $('#SrednjaOcena4').mask("r.tt");
        $('#SrednjaOcenaSrednjaSkola').mask("r.tt");

    </script>
@endsection
