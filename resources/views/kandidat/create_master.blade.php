@extends('layouts.layout')
@section('page_heading','Prijava kandidata za Master studije')
@section('section')
    <div class="col-sm-12" style="margin-bottom: 5%">
        <div class="row">
            <div class="col-lg-8">
                
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

                <form role="form" method="post" action="{{ url('/storeMaster') }}">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Dokumenta</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group">
                                <label for="StudijskiProgram">Studijski Program:</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <p><strong>Uz prijavu prilažem:</strong></p>
                            @foreach($dokumentiPrvaGodina as $dokument)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="{{ $dokument->naziv }}" value="{{$dokument->id}}">
                                        {{ $dokument->naziv }}
                                    </label>
                                </div>
                            @endforeach
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
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata" value="{{ old('ImeKandidata') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="PrezimeKandidata">Prezime Kandidata</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata" value="{{ old('PrezimeKandidata') }}" >
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Adresa Stanovanja</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja" style="max-width: 80%" value="{{ old('AdresaStanovanja') }}" >
                            </div>
                            <div class="form-group" style="width: 70%;">
                                <label for="JMBG">JMBG</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ old('JMBG') }}" >
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Kontakt Telefon</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon" style="max-width: 40%" value="{{ old('KontaktTelefon') }}" >
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%" value="{{ old('Email') }}" >
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Naziv Škole ili Fakulteta:</label>
                                <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="SmerZavrseneSkoleFakulteta">Smer Zavrsene Škole ili Fakulteta</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta" value="{{ old('SmerZavrseneSkoleFakulteta') }}">
                            </div>
                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Mesto Zavrsene Škole ili Fakulteta:</label>
                                <select class="form-control" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <hr>


                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="ProsecnaOcena">Prosečna Ocena</label>
                                <input class="form-control" type="text" name="ProsecnaOcena"
                                       id="ProsecnaOcena" value="{{ old('UpisniRok') }}">
                            </div>

                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="UpisniRok">Upisni Rok</label>
                                <input class="form-control" type="text" name="UpisniRok"
                                       id="UpisniRok" value="{{ old('UpisniRok') }}">
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Sačuvaj</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
