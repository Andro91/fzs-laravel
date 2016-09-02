@extends('layouts.layout')
@section('page_heading','Унос кандидата - друга страна')
@section('section')
    <div class="col-sm-12" style="margin-bottom: 5%">
        <div class="row">
            <div class="col-lg-8">
                <form role="form" method="post" action="{{ url('/kandidat') }}">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="page" id="page" value="2" />
                    <input type="hidden" name="insertedId" id="insertedId" value="{{ $insertedId }}" />

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Само за прву годину</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="prviRazred">1. разред</label>
                                <select class="form-control" id="prviRazred" name="prviRazred" tabindex="-1" >
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena1">Средња оцена</label>
                                <input class="form-control" type="text" name="SrednjaOcena1" id="SrednjaOcena1">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="drugiRazred">2. разред</label>
                                <select class="form-control" id="drugiRazred" name="drugiRazred" tabindex="-1" >
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena2">Средња оцена</label>
                                <input class="form-control" type="text" name="SrednjaOcena2" id="SrednjaOcena2">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="treciRazred">3. разред</label>
                                <select class="form-control" id="treciRazred" name="treciRazred" tabindex="-1" >
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena3">Средња оцена</label>
                                <input class="form-control" type="text" name="SrednjaOcena3" id="SrednjaOcena3">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="cetvrtiRazred">4. разред</label>
                                <select class="form-control" id="cetvrtiRazred" name="cetvrtiRazred" tabindex="-1">
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena4">Средња оцена</label>
                                <input class="form-control" type="text" name="SrednjaOcena4" id="SrednjaOcena4">
                            </div>

                            <div class="clearfix"></div>
                            <hr>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="OpstiUspehSrednjaSkola">Општи успех средња школа</label>
                                <select class="form-control" id="OpstiUspehSrednjaSkola" name="OpstiUspehSrednjaSkola"
                                        tabindex="-1" >
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcenaSrednjaSkola">Средња оцена средња школа</label>
                                <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                       id="SrednjaOcenaSrednjaSkola">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Спортско ангажовање</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-condensed">
                            <col width="10%">
                            <col width="25%">
                            <col width="40%">
                            <col width="15%">
                            <col width="10%">
                                <thead>
                                <tr>
                                    <th>р.б.</th>
                                    <th>Спорт</th>
                                    <th>Клуб</th>
                                    <th>Узраст (од - до)</th>
                                    <th>Број година</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td>
                                        <select class="form-control" id="sport1" name="sport1">
                                            <option value="0">НЕМА</option>
                                            @foreach($sport as $item)
                                                <option value="{{$item->id}}">{{$item->naziv}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="form-control" type="text" name="klub1" id="klub1"></td>
                                    <td><input class="form-control" type="text" name="uzrast1" id="uzrast1"></td>
                                    <td><input class="form-control" type="text" name="godine1" id="godine1"></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td>
                                        <select class="form-control" id="sport2" name="sport2">
                                            <option value="0">НЕМА</option>
                                            @foreach($sport as $item)
                                                <option value="{{$item->id}}">{{$item->naziv}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="form-control" type="text" name="klub2" id="klub2"></td>
                                    <td><input class="form-control" type="text" name="uzrast2" id="uzrast2"></td>
                                    <td><input class="form-control" type="text" name="godine2" id="godine2"></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td>
                                        <select class="form-control" id="sport3" name="sport3">
                                            <option value="0">НЕМА</option>
                                            @foreach($sport as $item)
                                                <option value="{{$item->id}}">{{$item->naziv}}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input class="form-control" type="text" name="klub3" id="klub3"></td>
                                    <td><input class="form-control" type="text" name="uzrast3" id="uzrast3"></td>
                                    <td><input class="form-control" type="text" name="godine3" id="godine3"></td>
                                </tr>
                                </tbody>
                            </table>
                            {{--<div class="form-group">--}}
                                {{--<label for="SportskoAngazovanje">SportskoAngazovanje:</label>--}}
                                {{--<select class="form-control" id="SportskoAngazovanje" name="SportskoAngazovanje">--}}
                                    {{--@foreach($sportskoAngazovanje as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->nazivKluba}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="VisinaKandidata">Висина кандидата (cm)</label>
                                <input class="form-control" type="text" name="VisinaKandidata" id="VisinaKandidata">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="TelesnaTezinaKandidata">Телесна тежина кандидата (kg)</label>
                                <input class="form-control" type="text" name="TelesnaTezinaKandidata" id="TelesnaTezinaKandidata">
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="TelesnaTezinaKandidata">TelesnaTezinaKandidata</label>--}}
                                {{--<input class="form-control" type="text" name="TelesnaTezinaKandidata"--}}
                                       {{--id="TelesnaTezinaKandidata">--}}
                            {{--</div>--}}
                            {{--<div class="form-group">--}}
                                {{--<label for="VisinaKandidata">VisinaKandidata</label>--}}
                                {{--<input class="form-control" type="text" name="VisinaKandidata" id="VisinaKandidata">--}}
                            {{--</div>--}}
                        </div>
                    </div>

                    <div class="panel panel-default pull-left" style="width: 50%">
                        <div class="panel-heading">
                            <h3 class="panel-title">ДОКУМЕНТА - за упис на  I ГОДИНУ СТУДИЈА</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($dokumentiPrvaGodina as $i=>$dokument)
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" name="dokumentiPrva[{{ $i }}]" value="{{$dokument->id}}">
                                    {{ $dokument->naziv }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="panel panel-default pull-left" style="width: 50%;">
                        <div class="panel-heading">
                            <h3 class="panel-title">ДОКУМЕНТА - за упис на  II, III и IV ГОДИНУ СТУДИЈА и прелазак
                                са другог факултета</h3>
                        </div>
                        <div class="panel-body">
                            @foreach($dokumentiOstaleGodine as $i=>$dokument)
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="dokumentiDruga[{{ $i }}]" value="{{$dokument->id}}">
                                        {{ $dokument->naziv }}
                                    </label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <div class="panel panel-info pull-left" style="width: 100%;">
                        <div class="panel-heading">
                            <h3 class="panel-title">Остало</h3>
                        </div>
                        <div class="panel-body">
                            {{--<div class="form-group">--}}
                                {{--<label for="StatusaUpisaKandidata">Status Upisa Kandidata:</label>--}}
                                {{--<select class="form-control" id="StatusaUpisaKandidata" name="StatusaUpisaKandidata">--}}
                                    {{--@foreach($statusaUpisaKandidata as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->naziv}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                            {{--</div>--}}
                            <div class="form-group">
                                <label for="BrojBodovaTest">Број бодова тест</label>
                                <input class="form-control" type="text" name="BrojBodovaTest" id="BrojBodovaTest">
                            </div>
                            <div class="form-group">
                                <label for="BrojBodovaSkola">Број бодова школа</label>
                                <input class="form-control" type="text" name="BrojBodovaSkola" id="BrojBodovaSkola">
                            </div>
                            <div class="form-group">
                                <label for="ukupniBrojBodova">Укупни број бодова</label>
                                <input class="form-control" type="text" name="ukupniBrojBodova" id="ukupniBrojBodova">
                            </div>
                            <div class="form-group">
                                <label for="UpisniRok">Уписни рок</label>
                                <input class="form-control" type="text" name="UpisniRok" id="UpisniRok">
                            </div>
                            {{--<div class="form-group">--}}
                                {{--<label for="IndikatorAktivan">Indikator Aktivan</label>--}}
                                {{--<input class="form-control" type="text" name="IndikatorAktivan" id="IndikatorAktivan">--}}
                            {{--</div>--}}
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-primary btn-lg">Даље</button>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ $putanja }}/js/kandidat-create-part-2.js"></script>
@endsection
