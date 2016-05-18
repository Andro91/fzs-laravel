@extends('layouts.layout')
@section('page_heading','Unos kandidata')
@section('section')
    <div class="col-sm-12" style="margin-bottom: 5%">
        <div class="row">
            <div class="col-lg-8">
                <form role="form" method="post" action="{{ url('/kandidat') }}">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Studijski program</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group" style="width: 50%;">
                                <label for="TipStudija">TipStudija:</label>
                                <select class="form-control" id="TipStudija" name="TipStudija">
                                    @foreach($tipStudija as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="StudijskiProgram">Studijski Program:</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SkolskeGodineUpisa">Skolska Godina:</label>
                                <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                    @foreach($skolskeGodineUpisa as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
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
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">KrsnaSlava:</label>
                                <select class="form-control" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
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
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="MestoZavrseneSkoleFakulteta">MestoZavrseneSkoleFakulteta:</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta" style="max-width: 60%">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="SmerZavrseneSkoleFakulteta">SmerZavrseneSkoleFakulteta</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta" style="max-width: 80%">
                            </div>
                            <div class="form-group">
                                <label for="GodinaStudija">GodinaStudija:</label>
                                <select class="form-control" id="GodinaStudija" name="GodinaStudija" style="max-width: 40%">
                                    @foreach($godinaStudija as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Dalje</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
