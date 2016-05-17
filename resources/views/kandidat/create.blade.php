@extends('layouts.layout')
@section('page_heading','Unos kandidata')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="post" action="{{ url('kandidat/create') }}">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Osnovni podaci</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImeKandidata">Ime Kandidata</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="PrezimeKandidata">Prezime Kandidata</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata">
                            </div>
                            <div class="form-group">
                                <label for="JMBG">JMBG</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" style="max-width: 60%">
                            </div>
                            <div class="form-group">
                                <label for="DatumRodjenja">Datum Rodjenja</label>
                                <input class="form-control" type="date" name="DatumRodjenja" id="DatumRodjenja" style="max-width: 60%">
                            </div>
                            <div class="form-group">
                                <label for="MestoRodjenja">MestoRodjenja:</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja" style="max-width: 60%">
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{$item->id}}">{{$item->NazivMesta}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">KrsnaSlava:</label>
                                <select class="form-control" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{$item->id}}">{{$item->NazivSlave}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Kontakt Telefon</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon" style="max-width: 40%">
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">AdresaStanovanja</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja" style="max-width: 80%">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%">
                            </div>
                            <div class="form-group">
                                <label for="ImePrezimeJednogRoditelja">ImePrezimeJednogRoditelja</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja" style="max-width: 80%">
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefonRoditelja">KontaktTelefonRoditelja</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja" style="max-width: 40%">
                            </div>
                            <div class="form-group">
                                <label for="NazivSkoleFakulteta">NazivSkoleFakulteta:</label>
                                <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta" style="max-width: 80%">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->NazivSkoleFakulteta}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="MestoZavrseneSkoleFakulteta">MestoZavrseneSkoleFakulteta:</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta" style="max-width: 60%">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->NazivMesta}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SmerZavrseneSkoleFakulteta">SmerZavrseneSkoleFakulteta</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta" style="max-width: 80%">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Samo za prvu godinu</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="UspehSrednjaSkola">UspehSrednjaSkola:</label>
                                <select class="form-control" id="UspehSrednjaSkola" name="UspehSrednjaSkola">
                                    @foreach($uspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->Naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="OpstiUspehSrednjaSkola">OpstiUspehSrednjaSkola:</label>
                                <select class="form-control" id="OpstiUspehSrednjaSkola" name="OpstiUspehSrednjaSkola">
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->Naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SrednjaOcenaSrednjaSkola">SrednjaOcenaSrednjaSkola</label>
                                <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                       id="SrednjaOcenaSrednjaSkola">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sportsko angazovanje</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="SportskoAngazovanje">SportskoAngazovanje:</label>
                                <select class="form-control" id="SportskoAngazovanje" name="SportskoAngazovanje">
                                    @foreach($sportskoAngazovanje as $item)
                                        <option value="{{$item->id}}">{{$item->NazivKluba}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="TelesnaTezinaKandidata">TelesnaTezinaKandidata</label>
                                <input class="form-control" type="text" name="TelesnaTezinaKandidata"
                                       id="TelesnaTezinaKandidata">
                            </div>
                            <div class="form-group">
                                <label for="VisinaKandidata">VisinaKandidata</label>
                                <input class="form-control" type="text" name="VisinaKandidata" id="VisinaKandidata">
                            </div>
                        </div>
                    </div>



                    <div class="form-group">
                        <label for="PrilozeniDokumentPrvaGodina">PrilozeniDokumentPrvaGodina:</label>
                        <select class="form-control" id="PrilozeniDokumentPrvaGodina"
                                name="PrilozeniDokumentPrvaGodina">
                            @foreach($prilozeniDokumentPrvaGodina as $item)
                                <option value="{{$item->id}}">{{$item->NazivDokumenta}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="StatusaUpisaKandidata">StatusaUpisaKandidata:</label>
                        <select class="form-control" id="StatusaUpisaKandidata" name="StatusaUpisaKandidata">
                            @foreach($statusaUpisaKandidata as $item)
                                <option value="{{$item->id}}">{{$item->NazivStatusaStudiranja}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="BrojBodovaTest">BrojBodovaTest</label>
                        <input class="form-control" type="text" name="BrojBodovaTest" id="BrojBodovaTest">
                    </div>
                    <div class="form-group">
                        <label for="BrojBodovaSkola">BrojBodovaSkola</label>
                        <input class="form-control" type="text" name="BrojBodovaSkola" id="BrojBodovaSkola">
                    </div>
                    <div class="form-group">
                        <label for="UpisniRok">UpisniRok</label>
                        <input class="form-control" type="text" name="UpisniRok" id="UpisniRok">
                    </div>
                    <div class="form-group">
                        <label for="SkolskeGodineUpisa">SkolskeGodineUpisa:</label>
                        <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                            @foreach($skolskeGodineUpisa as $item)
                                <option value="{{$item->id}}">{{$item->NazivSkolskeGodineUpisa}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="IndikatorAktivan">IndikatorAktivan</label>
                        <input class="form-control" type="text" name="IndikatorAktivan" id="IndikatorAktivan">
                    </div>
                    <div class="form-group">
                        <label for="StudijskiProgram">StudijskiProgram:</label>
                        <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                            @foreach($studijskiProgram as $item)
                                <option value="{{$item->id}}">{{$item->NazivStudijskogPrograma}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="TipStudija">TipStudija:</label>
                        <select class="form-control" id="TipStudija" name="TipStudija">
                            @foreach($tipStudija as $item)
                                <option value="{{$item->id}}">{{$item->Naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="GodinaStudija">GodinaStudija:</label>
                        <select class="form-control" id="GodinaStudija" name="GodinaStudija">
                            @foreach($godinaStudija as $item)
                                <option value="{{$item->id}}">{{$item->Naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="MestoZavrseneSkoleFakulteta">MestoZavrseneSkoleFakulteta:</label>
                        <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                name="MestoZavrseneSkoleFakulteta">
                            @foreach($mestoZavrseneSkoleFakulteta as $item)
                                <option value="{{$item->id}}">{{$item->NazivMesta}}</option>
                            @endforeach
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
