@extends('layouts.layout')
@section('page_heading','Unos kandidata')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-8">
                <form role="form" method="post" action="{{ url('kandidat/create') }}">
                    <input type="hidden" name="_token" id="csrf-token" value="{{ Session::token() }}" />
                    <input type="hidden" name="page" id="page" value="2" />
                    <input type="hidden" name="insertedId" id="insertedId" value="{{ $insertedId }}" />

                    <div class="panel panel-warning">
                        <div class="panel-heading">
                            <h3 class="panel-title">Samo za prvu godinu</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="prviRazred">1. razred</label>
                                <input class="form-control" type="text" name="prviRazred" id="prviRazred" placeholder="uspeh">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena1">Srednja Ocena</label>
                                <input class="form-control" type="text" name="SrednjaOcena1" id="SrednjaOcena1">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="drugiRazred">2. razred</label>
                                <input class="form-control" type="text" name="drugiRazred" id="drugiRazred" placeholder="uspeh">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena2">Srednja Ocena</label>
                                <input class="form-control" type="text" name="SrednjaOcena2" id="SrednjaOcena2">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="treciRazred">3. razred</label>
                                <input class="form-control" type="text" name="treciRazred" id="treciRazred" placeholder="uspeh">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena3">Srednja Ocena</label>
                                <input class="form-control" type="text" name="SrednjaOcena3" id="SrednjaOcena3">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="cetvrtiRazred">4. razred</label>
                                <input class="form-control" type="text" name="cetvrtiRazred" id="cetvrtiRazred" placeholder="uspeh">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="SrednjaOcena4">Srednja Ocena</label>
                                <input class="form-control" type="text" name="SrednjaOcena4" id="SrednjaOcena4">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="OpstiUspehSrednjaSkola">OpstiUspehSrednjaSkola:</label>
                                <select class="form-control" id="OpstiUspehSrednjaSkola" name="OpstiUspehSrednjaSkola">
                                    @foreach($opstiUspehSrednjaSkola as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="UspehSrednjaSkola">UspehSrednjaSkola:</label>
                                {{--<select class="form-control" id="UspehSrednjaSkola" name="UspehSrednjaSkola">--}}
                                    {{--@foreach($uspehSrednjaSkola as $item)--}}
                                        {{--<option value="{{$item->id}}">{{$item->naziv}}</option>--}}
                                    {{--@endforeach--}}
                                {{--</select>--}}
                                <input class="form-control" type="text" name="UspehSrednjaSkola" id="UspehSrednjaSkola">
                            </div>
                            <div class="form-group">
                                <label for="SrednjaOcenaSrednjaSkola">SrednjaOcenaSrednjaSkola</label>
                                <input class="form-control" type="text" name="SrednjaOcenaSrednjaSkola"
                                       id="SrednjaOcenaSrednjaSkola">
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sportsko angazovanje</h3>
                        </div>
                        <div class="panel-body">
                            <table class="table table-bordered table-condensed">
                                <thead>
                                <tr>
                                    <th>r.b.</th>
                                    <th>Sport</th>
                                    <th>Klub</th>
                                    <th>Uzrast</th>
                                    <th>Broj godina</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <td>1.</td>
                                    <td><input class="form-control" style="margin: 0 0 0 0" type="text" name="sport1" id="sport1"></td>
                                    <td><input class="form-control" type="text" name="klub1" id="klub1"></td>
                                    <td><input class="form-control" type="text" name="uzrast1" id="uzrast1"></td>
                                    <td><input class="form-control" type="text" name="godine1" id="godine1"></td>
                                </tr>
                                <tr>
                                    <td>2.</td>
                                    <td><input class="form-control" type="text" name="sport2" id="sport2"></td>
                                    <td><input class="form-control" type="text" name="klub2" id="klub2"></td>
                                    <td><input class="form-control" type="text" name="uzrast2" id="uzrast2"></td>
                                    <td><input class="form-control" type="text" name="godine2" id="godine2"></td>
                                </tr>
                                <tr>
                                    <td>3.</td>
                                    <td><input class="form-control" type="text" name="sport3" id="sport3"></td>
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
                                <label for="VisinaKandidata">VisinaKandidata</label>
                                <input class="form-control" type="text" name="VisinaKandidata" id="VisinaKandidata">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-left: 2%;">
                                <label for="TelesnaTezinaKandidata">TelesnaTezinaKandidata</label>
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

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">DOKUMENTA - za upis na I GODINU STUDIJA</h3>
                        </div>
                        <div class="panel-body">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Diploma o završenoj srednjoj školi
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Svedočanstva iz srednje škole (sve četiri godine)
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Izvod iz matične knjige rođenih
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    3 fotografije
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <h3 class="panel-title">DOKUMENTA - za upis na II, III, IV GODINU STUDIJA i prelazak sa
                            drugog fakulteta</h3>
                        </div>
                        <div class="panel-body">
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Diploma o završenoj visokoj školi
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Uverenje o položenim ispitima
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    Izvod iz matične knjige rođenih
                                </label>
                            </div>
                            <div class="checkbox">
                                <label>
                                    <input type="checkbox" value="">
                                    3 fotografije
                                </label>
                            </div>
                        </div>
                    </div>




                    <div class="panel panel-info">
                        <div class="panel-heading">
                            <h3 class="panel-title">Sportsko angazovanje</h3>
                        </div>
                        <div class="panel-body">
                            <div class="form-group">
                                <label for="PrilozeniDokumentPrvaGodina">PrilozeniDokumentPrvaGodina:</label>
                                <select class="form-control" id="PrilozeniDokumentPrvaGodina"
                                        name="PrilozeniDokumentPrvaGodina">
                                    @foreach($prilozeniDokumentPrvaGodina as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="StatusaUpisaKandidata">StatusaUpisaKandidata:</label>
                                <select class="form-control" id="StatusaUpisaKandidata" name="StatusaUpisaKandidata">
                                    @foreach($statusaUpisaKandidata as $item)
                                        <option value="{{$item->id}}">{{$item->naziv}}</option>
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
                                <label for="IndikatorAktivan">IndikatorAktivan</label>
                                <input class="form-control" type="text" name="IndikatorAktivan" id="IndikatorAktivan">
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
@endsection
