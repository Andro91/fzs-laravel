@extends('layouts.layout')
@section('page_heading','Унос кандидата - прва страна')
@section('section')
    <div class="col-sm-12" style="margin-bottom: 5%">
        <div class="row">
            <div class="col-lg-8">
                
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

                @if (Session::get('jmbgError'))
                    <div class="alert alert-dismissable alert-danger">
                        <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Грешка!</h4>
                        <p>ЈМБГ већ постоји у систему.</p>
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif

                <form role="form" method="post" action="{{ url('/kandidat') }}">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">Студијски програм</h3>
                        </div>
                        <div class="panel-body">
                            {{--<div class="form-group pull-left" style="width: 28%; margin-right: 2%">--}}
                                {{--<label for="TipStudija">Tip Studija:</label>--}}
                                {{--<select class="form-control" id="TipStudija" name="TipStudija">--}}
                                    {{--@foreach($tipStudija as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->naziv}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                                <label for="StudijskiProgram">Студијски програм:</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 30%;">
                                <label for="SkolskeGodineUpisa">Школска година:</label>
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
                            <h3 class="panel-title">Основни подаци</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImeKandidata">Име кандидата</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata" value="{{ old('ImeKandidata') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="PrezimeKandidata">Презиме кандидата</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata" value="{{ old('PrezimeKandidata') }}" >
                            </div>

                            <div class="form-group pull-left" style="width: 60%; margin-right: 2%;">
                                <label for="JMBG">ЈМБГ</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ old('JMBG') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 38%;">
                                <label for="DatumRodjenja">Датум рођења</label>
                                <input class="form-control" type="text" name="DatumRodjenja" id="DatumRodjenja" value="{{ old('DatumRodjenja') }}" >
                            </div>

                            <div class="form-group" style="width: 60%">
                                <label for="MestoRodjenja">Место рођења</label>
                                <select class="form-control auto-combobox" id="MestoRodjenja" name="MestoRodjenja" style="max-width: 60%" value="{{ old('MestoRodjenja') }}" >
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" style="width: 60%">
                                <label for="KrsnaSlava">Крсна слава</label>
                                <select class="form-control auto-combobox" id="KrsnaSlava" name="KrsnaSlava" style="max-width: 50%">
                                    @foreach($krsnaSlava as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Контакт телефон</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon" style="max-width: 40%" value="{{ old('KontaktTelefon') }}" >
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Адреса становања</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja" style="max-width: 80%" value="{{ old('AdresaStanovanja') }}" >
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%" value="{{ old('Email') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImePrezimeJednogRoditelja">Име и презиме једног родитеља</label>
                                <input class="form-control" type="text" name="ImePrezimeJednogRoditelja"
                                       id="ImePrezimeJednogRoditelja" value="{{ old('ImePrezimeJednogRoditelja') }}" >
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="KontaktTelefonRoditelja">контакт телефон родитеља</label>
                                <input class="form-control" type="text" name="KontaktTelefonRoditelja"
                                       id="KontaktTelefonRoditelja" value="{{ old('KontaktTelefonRoditelja') }}" >
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                                <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                       id="NazivSkoleFakulteta" value="{{ old('NazivSkoleFakulteta') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                                <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                       id="SmerZavrseneSkoleFakulteta" value="{{ old('SmerZavrseneSkoleFakulteta') }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                                <select class="form-control auto-combobox" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="GodinaStudija">Година студија</label>
                                <select class="form-control" id="GodinaStudija" name="GodinaStudija" style="max-width: 40%">
                                    @foreach($godinaStudija as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Даље</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ $putanja }}/js/kandidat-create-part-1.js"></script>
@endsection
