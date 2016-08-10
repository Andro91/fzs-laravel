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

                <form role="form" method="post" action="{{$putanja}}/storeMaster">
                    {{ csrf_field() }}
                    {{--<input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />--}}
                    <input type="hidden" name="page" id="page" value="1" />

                    {{--STUDIJSKI PROGRAM--}}
                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Документа</h3>
                        </div>
                        <div class="panel-body">

                            <div class="form-group pull-left" style="width: 60%">
                                <label for="StudijskiProgram">Студијски програм</label>
                                <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                                    @foreach($studijskiProgram as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 30%; margin-left: 10%">
                                <label for="SkolskeGodineUpisa">Школска година:</label>
                                <select class="form-control" id="SkolskeGodineUpisa" name="SkolskeGodineUpisa">
                                    @foreach($skolskeGodineUpisa as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="uplata">
                                    <input type="checkbox" id="uplata" name="uplata">
                                    Уплата (да ли је кандидат платио школарину)</label>
                            </div>

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
                            <div class="form-group">
                                <label for="AdresaStanovanja">Адреса становања</label>
                                <input class="form-control" type="text" name="AdresaStanovanja" 
                                id="AdresaStanovanja" style="max-width: 80%" value="{{ old('AdresaStanovanja') }}" >
                            </div>
                            <div class="form-group" style="width: 70%;">
                                <label for="JMBG">ЈМБГ</label>
                                <input class="form-control" type="text" name="JMBG" id="JMBG" value="{{ old('JMBG') }}" >
                            </div>
                            <div class="form-group" style="width: 70%;">
                                <label for="MestoRodjenja">Место рођења</label>
                                <select class="form-control auto-combobox" id="MestoRodjenja" 
                                name="MestoRodjenja" style="max-width: 60%" >
                                    @foreach($mestoRodjenja as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="KontaktTelefon">Контакт телефон</label>
                                <input class="form-control" type="text" name="KontaktTelefon" 
                                id="KontaktTelefon" style="max-width: 40%" value="{{ old('KontaktTelefon') }}" >
                            </div>
                            <div class="form-group">
                                <label for="Email">Email</label>
                                <input class="form-control" type="text" name="Email" id="Email" style="max-width: 60%" value="{{ old('Email') }}" >
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
                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="MestoZavrseneSkoleFakulteta">Место завршене школе или факултета</label>
                                <select class="form-control auto-combobox" id="MestoZavrseneSkoleFakulteta"
                                        name="MestoZavrseneSkoleFakulteta">
                                    @foreach($mestoZavrseneSkoleFakulteta as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="clearfix"></div>
                            <hr>


                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="ProsecnaOcena">Просечна оцена</label>
                                <input class="form-control" type="text" name="ProsecnaOcena"
                                       id="ProsecnaOcena" value="{{ old('UpisniRok') }}">
                            </div>

                            <div class="form-group" style="width: 48%; margin-right: 2%;">
                                <label for="UpisniRok">Уписни рок</label>
                                <input class="form-control" type="text" name="UpisniRok"
                                       id="UpisniRok" value="{{ old('UpisniRok') }}">
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
    <script>
        $(document).ready(function() {
          $(window).keydown(function(event){
            if(event.keyCode == 13) {
              event.preventDefault();
              return false;
            }
          });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection
