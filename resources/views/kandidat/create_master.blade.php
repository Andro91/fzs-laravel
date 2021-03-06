@extends('layouts.layout')
@section('page_heading','Пријава кандидата за мастер студије')
@section('section')
    <div class="col-lg-9">
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

        <form role="form" method="post" action="{{$putanja}}/storeMaster" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="page" id="page" value="1"/>

            {{--STUDIJSKI PROGRAM--}}
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Документа</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-7">
                            <label for="StudijskiProgram">Студијски програм</label>
                            <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                @foreach($studijskiProgram as $item)
                                    <option value="{{$item->id}}">{{$item->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4 col-lg-offset-1">
                            <label for="SkolskeGodineUpisa">Школска година:</label>
                            <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                @foreach($skolskeGodineUpisa as $item)
                                    <option value="{{$item->id}}">{{$item->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    {{--<div class="row">--}}
                        {{--<div class="form-group col-lg-12">--}}
                            {{--<label for="uplata">--}}
                                {{--<input type="checkbox" id="uplata" name="uplata">--}}
                                {{--Уплата (да ли је кандидат платио школарину)</label>--}}
                        {{--</div>--}}
                    {{--</div>--}}
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <p><strong>Уз пријаву прилажем:</strong></p>
                            @foreach($dokumentaMaster as $i=>$dokument)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="dokumentaMaster[{{ $i }}]" value="{{$dokument->id}}">
                                        {{ $dokument->naziv }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>

            {{--OSNOVNI PODACI--}}
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Основни подаци</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="ImeKandidata">Име кандидата</label>
                            <input class="form-control" type="text" name="ImeKandidata" id="ImeKandidata"
                                   value="{{ old('ImeKandidata') }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="PrezimeKandidata">Презиме кандидата</label>
                            <input class="form-control" type="text" name="PrezimeKandidata" id="PrezimeKandidata"
                                   value="{{ old('PrezimeKandidata') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-12">
                            <label for="imageUpload">Слика</label>
                            <input type="file" name="imageUpload" id="imageUpload">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-10">
                            <label for="AdresaStanovanja">Адреса становања</label>
                            <input class="form-control" type="text" name="AdresaStanovanja"
                                   id="AdresaStanovanja" value="{{ old('AdresaStanovanja') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-8">
                            <label for="JMBG">ЈМБГ</label>
                            <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ old('JMBG') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="mestoRodjenja">Место рођења</label>
                            <input type="text" name="mestoRodjenja" id="mestoRodjenja" list="mestaList"
                                   class="form-control" value="{{ old('mestoRodjenja') }}">
                            <datalist id="mestaList">
                                @foreach($mestoRodjenja as $item)
                                    <option value="{{$item->naziv}}">
                                @endforeach
                            </datalist>
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="drzavaRodjenja">Држава рођења</label>
                            <input class="form-control" type="text" name="drzavaRodjenja" id="drzavaRodjenja"
                                   value="{{ old('drzavaRodjenja') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-5">
                            <label for="KontaktTelefon">Контакт телефон</label>
                            <input class="form-control" type="text" name="KontaktTelefon"
                                   id="KontaktTelefon" value="{{ old('KontaktTelefon') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="Email">Email</label>
                            <input class="form-control" type="text" name="Email" id="Email"
                                   value="{{ old('Email') }}">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                            <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                   id="NazivSkoleFakulteta" value="{{ old('NazivSkoleFakulteta') }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                            <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                   id="SmerZavrseneSkoleFakulteta" value="{{ old('SmerZavrseneSkoleFakulteta') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="mestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                            <input type="text" class="form-control" id="mestoZavrseneSkoleFakulteta"
                                   name="mestoZavrseneSkoleFakulteta" list="mestaList">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="drzavaZavrseneSkole">Држава завршене школе или факултета</label>
                            <input class="form-control" type="text" name="drzavaZavrseneSkole" id="drzavaZavrseneSkole"
                                   value="{{ old('drzavaZavrseneSkole') }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="godinaZavrsetkaSkole">Година завршетка школе или факултета</label>
                            <input class="form-control" type="text" name="godinaZavrsetkaSkole" id="godinaZavrsetkaSkole"
                                   value="{{ old('godinaZavrsetkaSkole') }}">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="ProsecnaOcena">Просечна оцена</label>
                            <input class="form-control" type="text" name="ProsecnaOcena"
                                   id="ProsecnaOcena" value="{{ old('UpisniRok') }}">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="UpisniRok">Уписни рок</label>
                            <input class="form-control" type="text" name="UpisniRok"
                                   id="UpisniRok" value="{{ old('UpisniRok') }}">
                        </div>
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
    <script>
        $(document).ready(function () {
            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    return false;
                }
            });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection
