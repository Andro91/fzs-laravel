@extends('layouts.layout')
@section('page_heading',$kandidat->upisan == 0 ? 'Измена података кандидата за мастер студије' : "Измена података активног студента мастер студија")
@section('section')
    <div class="col-lg-10">
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

        <form role="form" method="post" action="{{$putanja}}/master/{{ $kandidat->id }}/edit"
              enctype="multipart/form-data">
            {{ csrf_field() }}

            {{--STUDIJSKI PROGRAM--}}
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Документа</h3>
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="form-group col-lg-10">
                            <label for="TipStudija">Тип студија</label>
                            <select class="form-control" id="TipStudija" name="TipStudija">
                                @foreach($tipStudija as $item)
                                    <option value="{{ $item->id }}" {{ ($kandidat->tipStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-10">
                            <label for="StudijskiProgram">Студијски програм</label>
                            <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                @foreach($studijskiProgram as $item)
                                    <option value="{{ $item->id }}" {{ ($kandidat->studijskiProgram_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-10">
                            <label for="SkolskeGodineUpisa">Школска година:</label>
                            <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                @foreach($skolskeGodineUpisa as $item)
                                    <option value="{{ $item->id }}" {{ ($kandidat->skolskaGodinaUpisa_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="statusUpisa_id">Статус</label>
                            <select class="form-control" id="statusUpisa_id"
                                    name="statusUpisa_id" disabled>
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
                                           $kandidat->datumStatusa->format('d.m.Y.') : "" }}" disabled>
                        </div>
                    </div>
                    {{--<div class="form-group">--}}
                        {{--<label for="uplata">--}}
                            {{--<input type="checkbox" id="uplata"--}}
                                   {{--name="uplata" {{ $kandidat->uplata ? "checked":"" }}>--}}
                            {{--Уплата (да ли је кандидат платио школарину)</label>--}}
                    {{--</div>--}}
                    <p><strong>Уз пријаву прилажем:</strong></p>
                    @foreach($dokumentaMaster as $i=>$dokument)
                        <div class="checkbox">
                            <label>
                                <input type="checkbox" name="dokumentaMaster[{{ $i }}]"
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
                    {{--@if($kandidat->statusUpisa_id == 1)--}}
                        <div class="form-group">
                            <label for="brojIndeksa">Број Индекса</label>
                            <input class="form-control" type="text" name="brojIndeksa" id="brojIndeksa"
                                   value="{{ $kandidat->brojIndeksa }}">
                        </div>
                    {{--@endif--}}
                    <div class="row">
                        <div class="col-lg-4 text-center">
                            <img src="{{$putanja}}/uploads/images/{{$kandidat->slika}}" class="img-thumbnail"
                                 style="max-height: 300px">
                        </div>
                        <div class="row col-lg-8">
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
                                <input type="file" name="imageUpload" id="imageUpload">
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="form-group col-lg-9">
                            <label for="AdresaStanovanja">Адреса становања</label>
                            <input class="form-control" type="text" name="AdresaStanovanja"
                                   id="AdresaStanovanja" value="{{ $kandidat->adresaStanovanja }}">
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="JMBG">ЈМБГ</label>
                            <input class="form-control" type="text" name="JMBG" id="JMBG"
                                   value="{{ $kandidat->jmbg }}">
                        </div>
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
                            <input class="form-control" type="text" name="drzavaRodjenja"
                                   id="drzavaRodjenja"
                                   value="{{ $kandidat->drzavaRodjenja }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="KontaktTelefon">Контакт телефон</label>
                            <input class="form-control" type="text" name="KontaktTelefon" id="KontaktTelefon"
                                   value="{{ $kandidat->kontaktTelefon }}">
                        </div>
                        <div class="form-group col-lg-8">
                            <label for="Email">Email</label>
                            <input class="form-control" type="text" name="Email" id="Email"
                                   value="{{ $kandidat->email }}">
                        </div>
                    </div>


                    <div class="clearfix"></div>
                    <hr>

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="NazivSkoleFakulteta">Назив школе или факултета</label>
                            <input class="form-control" type="text" name="NazivSkoleFakulteta"
                                   id="NazivSkoleFakulteta"
                                   value="{{ $kandidat->srednjeSkoleFakulteti }}">

                        </div>
                        <div class="form-group col-lg-6">
                            <label for="SmerZavrseneSkoleFakulteta">Смер завршене школе или факултета</label>
                            <input class="form-control" type="text" name="SmerZavrseneSkoleFakulteta"
                                   id="SmerZavrseneSkoleFakulteta"
                                   value="{{ $kandidat->smerZavrseneSkoleFakulteta }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="mestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                            <input type="text" class="form-control" id="mestoZavrseneSkoleFakulteta"
                                   name="mestoZavrseneSkoleFakulteta" list="mestaList"
                                   value="{{ $kandidat->mestoZavrseneSkoleFakulteta }}">
                        </div>
                        <div class="form-group col-lg-6">
                            <label for="drzavaZavrseneSkole">Држава завршене школе или факултета</label>
                            <input class="form-control" type="text" name="drzavaZavrseneSkole" id="drzavaZavrseneSkole"
                                   value="{{ $kandidat->drzavaZavrseneSkole }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="godinaZavrsetkaSkole">Година завршетка школе или факултета</label>
                            <input class="form-control" type="text" name="godinaZavrsetkaSkole"
                                   id="godinaZavrsetkaSkole"
                                   value="{{ $kandidat->godinaZavrsetkaSkole }}">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>


                    <div class="row">
                        <div class="form-group col-lg-7">
                            <label for="ProsecnaOcena">Просечна оцена</label>
                            <input class="form-control" type="text" name="ProsecnaOcena"
                                   id="ProsecnaOcena" value="{{ $kandidat->prosecnaOcena }}">
                        </div>

                        <div class="form-group col-lg-7">
                            <label for="UpisniRok">Уписни рок</label>
                            <input class="form-control" type="text" name="UpisniRok"
                                   id="UpisniRok" value="{{ $kandidat->upisniRok }}">
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-primary btn-lg">Сачувај</button>
                        <input type="submit" name="submitstay" value="Сачувај и остани" class="btn btn-primary btn-lg">
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
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection
