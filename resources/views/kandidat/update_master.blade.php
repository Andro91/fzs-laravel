@extends('layouts.layout')
@section('page_heading','Пријава кандидата за мастер студије')
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
                        <h4><span class="glyphicon glyphicon-exclamation-sign"></span> Грешка!</h4>
                        <p>ЈМБГ већ постоји у систему.</p>
                        <p>{{ Session::get('status') }}</p>
                    </div>
                @endif

                <form role="form" method="post" action="{{ url('/master/'. $kandidat->id .'/edit') }}">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Документа</h3>
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
                            <p><strong>Уз пријаву прилажем:</strong></p>
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

                    {{--OSNOVNI PODACI--}}
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Основни подаци</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ImeKandidata">Име кандидата</label>
                                <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata" value="{{ $kandidat->imeKandidata }}">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="PrezimeKandidata">Презиме кандидата</label>
                                <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata" value="{{ $kandidat->prezimeKandidata }}" >
                            </div>
                            <div class="form-group">
                                <label for="AdresaStanovanja">Адреса становања</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" id="AdresaStanovanja" style="max-width: 80%" value="{{ $kandidat->adresaStanovanja }}" >
                            </div>
                            <div class="form-group" style="width: 70%;">
                                <label for="JMBG">ЈМБГ</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ $kandidat->jmbg }}" >
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Контакт телефон</label>
                                <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon" style="max-width: 40%" value="{{ $kandidat->kontaktTelefon }}" >
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%" value="{{ $kandidat->email }}" >
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                                <select class="form-control" id="NazivSkoleFakulteta" name="NazivSkoleFakulteta">
                                    @foreach($nazivSkoleFakulteta as $item)
                                        <option value="{{ $item->id }}" {{ ($kandidat->srednjeSkoleFakulteti_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
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

                            <div class="clearfix"></div>
                            <hr>


                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="ProsecnaOcena">Просечна оцена</label>
                                <input class="form-control" type="text" name="ProsecnaOcena"
                                       id="ProsecnaOcena" value="{{ $kandidat->prosecnaOcena }}">
                            </div>

                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="UpisniRok">Уписни рок</label>
                                <input class="form-control" type="text" name="UpisniRok"
                                       id="UpisniRok" value="{{ $kandidat->upisniRok }}">
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-primary btn-lg">Сачувај</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
