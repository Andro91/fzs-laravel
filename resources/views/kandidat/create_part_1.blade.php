@extends('layouts.layout')
@section('page_heading','Unos kandidata')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-6">
                <form role="form" method="post" action="{{ url('kandidat/create') }}">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Osnovni podaci</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="ImeKandidata">Ime Kandidata</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata">
                            </div>
                            <div class="form-group">
                                <label for="PrezimeKandidata">Prezime Kandidata</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata">
                            </div>
                            <div class="form-group">
                                <label for="JMBG">JMBG</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG">
                            </div>
                            <div class="form-group">
                                <label for="DatumRodjenja">Datum Rodjenja</label>
                                <input class="form-control" type="date" name="DatumRodjenja" id="DatumRodjenja">
                            </div>
                            <div class="form-group">
                                <label for="MestoRodjenja">MestoRodjenja:</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja">
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{$item->id}}">{{$item->NazivMesta}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KrsnaSlava">KrsnaSlava:</label>
                                <select class="form-control" id="MestoRodjenja" name="MestoRodjenja">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{$item->id}}">{{$item->NazivSlave}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Kontakt Telefon</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon">
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">AdresaStanovanja</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja">
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email">
                            </div>
                            <div class="form-group">
                                <label for="ImePrezimeJednogRoditelja">ImePrezimeJednogRoditelja</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja">
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefonRoditelja">KontaktTelefonRoditelja</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja">
                            </div>
                            <div class="form-group">
                                <label for="NazivSkoleFakulteta">NazivSkoleFakulteta:</label>
                                <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->NazivSkoleFakulteta}}</option>
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
                            <div class="form-group">
                                <label for="SmerZavrseneSkoleFakulteta">SmerZavrseneSkoleFakulteta</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
