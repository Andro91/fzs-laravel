@extends('layouts.layout')
@section('page_heading',$kandidat->upisan == 0 ? "Измена података постојећег кандидата" : "Измена података активног студента")
@section('section')
    <form role="form" method="post" action="{{ url('/kandidat/' . $kandidat->id) }}" enctype="multipart/form-data">
        <div class="col-sm-12 col-lg-12">
            <div class="row">
                <div class="col-sm-12 col-lg-6">

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
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="statusUpisa_id">Статус</label>
                                    <select class="form-control" id="statusUpisa_id"
                                            name="statusUpisa_id">
                                        @foreach($statusKandidata as $item)
                                            <option value="{{ $item->id }}" {{ ($kandidat->statusUpisa_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="datumStatusa">Датум статуса</label>
                                    <input class="form-control dateMask" type="text" name="datumStatusa"
                                           id="datumStatusa"
                                           value="{{ !empty($kandidat->datumStatusa) ?
                                           $kandidat->datumStatusa->format('d.m.Y.') : "" }}">
                                </div>
                                @if($kandidat->upisan == 0)
                                    <div class="form-group col-lg-6">
                                        <label for="uplata">
                                            <input type="checkbox" id="uplata"
                                                   name="uplata" {{ $kandidat->uplata ? "checked":"" }}>
                                            Уплата (да ли је кандидат платио школарину)</label>
                                    </div>
                                @endif
                            </div>
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
                                    <label for="brojIndeksa">Број Индекса</label>
                                    <input class="form-control" type="text" name="brojIndeksa" id="brojIndeksa"
                                           value="{{ $kandidat->brojIndeksa }}">
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6">
                                    <img src="{{$putanja}}/uploads/images/{{$kandidat->slika}}" class="img-thumbnail"
                                         width="100%">
                                </div>
                                <div class="row col-lg-6">
                                    <div class="form-group col-lg-12">
                                        <label for="ImeKandidata">Име кандидата</label>
                                        <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata"
                                               value="{{ $kandidat->imeKandidata }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="PrezimeKandidata">Презиме кандидата</label>
                                        <input class="form-control" type="text" name="PrezimeKandidata"
                                               id="PrezimeKandidata"
                                               value="{{ $kandidat->prezimeKandidata }}">
                                    </div>
                                    <div class="form-group col-lg-12">
                                        <label for="imageUpload">Нова слика</label>
                                        <input type="file" accept="image/*" name="imageUpload" id="imageUpload">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="JMBG">ЈМБГ</label>
                                    <input class="form-control" type="text" name="JMBG" id="JMBG"
                                           value="{{ $kandidat->jmbg }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="DatumRodjenja">Датум рођења</label>
                                    <input class="form-control dateMask" type="text" name="DatumRodjenja" id="DatumRodjenja"
                                           value="{{ date('d.m.Y.',strtotime($kandidat->datumRodjenja)) }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-6">
                                    <label for="mestoRodjenja">Место рођења</label>
                                    <input type="text" name="mestoRodjenja" id="mestoRodjenja" list="mestaList"
                                           class="form-control"
                                           value="{{ $kandidat->mestoRodjenja }}">
                                    <datalist id="mestaList">
                                        @foreach($mestoRodjenja as $item)
                                            <option value="{{$item->naziv}}">
                                        @endforeach
                                    </datalist>
                                </div>
                                <div class="form-group col-lg-6">
                                    <label for="drzavaRodjenja">Држава рођења</label>
                                    <input class="form-control" type="text" name="drzavaRodjenja" id="drzavaRodjenja"
                                           value="{{ $kandidat->drzavaRodjenja }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="KrsnaSlava">Крсна слава</label>
                                    <select class="form-control auto-combobox" id="KrsnaSlava" name="KrsnaSlava">
                                        @foreach($krsnaSlava as $item)
                                            <option value="{{ $item->id }}" {{ ($kandidat->krsnaSlava_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group  col-lg-6">
                                    <label for="KontaktTelefon">Контакт телефон</label>
                                    <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon"
                                           value="{{ $kandidat->kontaktTelefon }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-12">
                                    <label for="AdresaStanovanja">Адреса становања</label>
                                    <input class="form-control" type="text" name="AdresaStanovanja"
                                           id="AdresaStanovanja"
                                           value="{{ $kandidat->adresaStanovanja }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-9">
                                    <label for="Email">Email</label>
                                    <input class="form-control" type="text" name="Email" id="Email"
                                           value="{{ $kandidat->email }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8">
                                    <label for="ImePrezimeJednogRoditelja">Име једног родитеља</label>
                                    <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                           id="ImePrezimeJednogRoditelja"
                                           value="{{ $kandidat->imePrezimeJednogRoditelja }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-8">
                                    <label for="KontaktTelefonRoditelja">Контакт телефон родитеља</label>
                                    <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                           id="KontaktTelefonRoditelja"
                                           value="{{ $kandidat->kontaktTelefonRoditelja }}">
                                </div>
                            </div>

                            <div class="clearfix"></div>
                            <hr>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                                    <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                           id="NazivSkoleFakulteta"
                                           value="{{ $kandidat->srednjeSkoleFakulteti }}">
                                </div>
                                <div class="form-group col-lg-10">
                                    <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                                    <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                           id="SmerZavrseneSkoleFakulteta"
                                           value="{{ $kandidat->smerZavrseneSkoleFakulteta }}">
                                </div>
                            </div>
                            <div class="row">
                                <div class="form-group col-lg-10">
                                    <label for="mestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                                    <input type="text" class="form-control" id="mestoZavrseneSkoleFakulteta"
                                           name="mestoZavrseneSkoleFakulteta" list="mestaList"
                                           value="{{ $kandidat->mestoZavrseneSkoleFakulteta }}">
                                </div>
                                <div class="form-group col-lg-10">
                                    <label for="drzavaZavrseneSkole">Држава завршене школе или факултета</label>
                                    <input class="form-control" type="text" name="drzavaZavrseneSkole"
                                           id="drzavaZavrseneSkole"
                                           value="{{ $kandidat->drzavaZavrseneSkole }}">
                                </div>
                                <div class="form-group col-lg-10">
                                    <label for="godinaZavrsetkaSkole">Година завршетка школе или факултета</label>
                                    <input class="form-control" type="text" name="godinaZavrsetkaSkole"
                                           id="godinaZavrsetkaSkole"
                                           value="{{ $kandidat->godinaZavrsetkaSkole }}">
                                </div>
                                <div class="form-group col-lg-10">
                                    <label for="GodinaStudija">Година студија</label>
                                    <select class="form-control" id="GodinaStudija" name="GodinaStudija">
                                        @foreach($godinaStudija as $item)
                                            <option value="{{ $item->id }}" {{ ($kandidat->godinaStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                        @endforeach
                                    </select>
                                </div>
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
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="prviRazred">1. разред</label>
                                            <select class="form-control" id="prviRazred" name="prviRazred"
                                                    tabindex="-1">
                                                @foreach($opstiUspehSrednjaSkola as $item)
                                                    <option value="{{$item->id}}" {{ ($prviRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{$item->naziv}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="SrednjaOcena1">Средња оцена</label>
                                            <input class="form-control" type="text" name="SrednjaOcena1"
                                                   id="SrednjaOcena1"
                                                   value="{{ number_format((float)$prviRazred->srednja_ocena, 2, '.', '') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="drugiRazred">2. разред</label>
                                            <select class="form-control" id="drugiRazred" name="drugiRazred"
                                                    tabindex="-1">
                                                @foreach($opstiUspehSrednjaSkola as $item)
                                                    <option value="{{ $item->id }}" {{ ($drugiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="SrednjaOcena2">Средња оцена</label>
                                            <input class="form-control" type="text" name="SrednjaOcena2"
                                                   id="SrednjaOcena2"
                                                   value="{{ number_format((float)$drugiRazred->srednja_ocena, 2, '.', '') }}">
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="treciRazred">3. разред</label>
                                            <select class="form-control" id="treciRazred" name="treciRazred"
                                                    tabindex="-1">
                                                @foreach($opstiUspehSrednjaSkola as $item)
                                                    <option value="{{ $item->id }}" {{ ($treciRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="SrednjaOcena3">Средња оцена</label>
                                            <input class="form-control" type="text" name="SrednjaOcena3"
                                                   id="SrednjaOcena3"
                                                   value="{{ number_format((float)$treciRazred->srednja_ocena, 2, '.', '') }}">
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="cetvrtiRazred">4. разред</label>
                                            <select class="form-control" id="cetvrtiRazred" name="cetvrtiRazred"
                                                    tabindex="-1">
                                                @foreach($opstiUspehSrednjaSkola as $item)
                                                    <option value="{{ $item->id }}" {{ ($cetvrtiRazred->opstiUspeh_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="SrednjaOcena4">Средња оцена</label>
                                            <input class="form-control" type="text" name="SrednjaOcena4"
                                                   id="SrednjaOcena4"
                                                   value="{{ number_format((float)$cetvrtiRazred->srednja_ocena, 2, '.', '') }}">
                                        </div>
                                    </div>

                                    <div class="clearfix"></div>
                                    <hr>

                                    <div class="row">
                                        <div class="form-group col-lg-6">
                                            <label for="OpstiUspehSrednjaSkola">Општи успех средња школа</label>
                                            <select class="form-control" id="OpstiUspehSrednjaSkola"
                                                    name="OpstiUspehSrednjaSkola"
                                                    tabindex="-1">
                                                @foreach($opstiUspehSrednjaSkola as $item)
                                                    <option value="{{ $item->id }}" {{ ($kandidat->opstiUspehSrednjaSkola_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="SrednjaOcenaSrednjaSkola">Средња оцена средња школа</label>
                                            <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                                   id="SrednjaOcenaSrednjaSkola"
                                                   value="{{ number_format((float)$kandidat->srednjaOcenaSrednjaSkola, 2, '.', '')}}">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
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
                        </div>
                        <div class="col-lg-12">
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
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ДОКУМЕНТА - за упис на I ГОДИНУ СТУДИЈА</h3>
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
                        </div>
                        <div class="col-lg-6">
                            <div class="panel panel-default">
                                <div class="panel-heading">
                                    <h3 class="panel-title">ДОКУМЕНТА - за упис на II, III и IV ГОДИНУ СТУДИЈА и
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
                        </div>

                        <div class="col-lg-12">
                            <div class="panel panel-info pull-left" style="width: 100%;">
                                <div class="panel-heading">
                                    <h3 class="panel-title">Остало</h3>
                                </div>
                                <div class="panel-body">
                                    <div class="row">
                                        <div class="form-group col-lg-12">
                                            <label for="BrojBodovaTest">Број бодова тест</label>
                                            <input class="form-control" type="text" name="BrojBodovaTest"
                                                   id="BrojBodovaTest" value="{{ $kandidat->brojBodovaTest }}">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="BrojBodovaSkola">Број бодова школа</label>
                                            <input class="form-control" type="text" name="BrojBodovaSkola"
                                                   id="BrojBodovaSkola" value="{{ $kandidat->brojBodovaSkola }}">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="ukupniBrojBodova">Укупни број бодова</label>
                                            <input class="form-control" type="text" name="ukupniBrojBodova"
                                                   id="ukupniBrojBodova" value="{{ $kandidat->ukupniBrojBodova }}">
                                        </div>
                                        <div class="form-group col-lg-12">
                                            <label for="UpisniRok">Уписни рок</label>
                                            <input class="form-control" type="text" name="UpisniRok" id="UpisniRok"
                                                   value="{{ $kandidat->upisniRok }}">
                                        </div>
                                        <div class="form-group col-lg-6">
                                            <label for="pdfUpload">Додај дипломски рад</label>
                                            <input type="file" accept="application/pdf" name="pdfUpload" id="pdfUpload">
                                        </div>
                                        @if(!empty($kandidat->diplomski))
                                            <div class="form-group col-lg-6">
                                                <label for="pdfUpload">Дипломски рад</label>
                                                <a class="btn btn-info" href="/uploads/pdf/{{$kandidat->diplomski}}">
                                                    <span class="fa fa-graduation-cap"></span>
                                                    Дипломски рад
                                                </a>
                                            </div>
                                        @endif
                                    </div>
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
                                <input type="submit" name="submitstay" value="Сачувај и остани"
                                       class="btn btn-success btn-lg">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </form>
    <script type="text/javascript" src="{{ $putanja }}/js/kandidat-create-part-1.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/kandidat-create-part-2.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection
