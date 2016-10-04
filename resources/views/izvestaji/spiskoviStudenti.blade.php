<title>Извештаји</title>
@extends('layouts.layout')
@section('page_heading','Извештаји')
@section('section')

    <div class="col-sm-12 col-lg-12">

        <div class="col-sm-12 col-lg-4">
            <form role="form" target="_blank" method="post" action="{{ url('/izvestaji/spisakZaSmer/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак студената по смеровима</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-10">
                                <label for="program">Студијски програм:</label>
                                <select class="form-control" id="program" name="program">
                                    @foreach($program as $program)
                                        <option value="{{$program->id}}">{{$program->naziv}}
                                            - {{$program->tipStudija->skrNaziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-6">
                                <label for="godina">Година студија:</label>
                                <select class="form-control" id="godina" name="godina">
                                    @foreach($godina as $godina)
                                        <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="skolskaGodina_id">Школска година:</label>
                                <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                    @foreach($skolskaGodina6 as $bla)
                                        <option value="{{$bla->id}}">{{$bla->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Штампај</button>
                    </div>
                </div>
            </form>

            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoGodini/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак по години</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-6">
                                <label for="godina">Година студија:</label>
                                <select class="form-control" id="godina" name="godina">
                                    @foreach($godinaS as $godinaS)
                                        <option value="{{$godinaS->id}}">{{$godinaS->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="skolskaGodina">
                                @foreach($skolskaGodina3 as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>

            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoProgramu/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак по програму</h3>
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="godina">Програм:</label>
                                <select class="form-control" id="program" name="program">
                                    @foreach($programS as $programS)
                                        <option value="{{$programS->id}}">{{$programS->naziv}}
                                            - {{$program->tipStudija->skrNaziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                @foreach($skolskaGodina4 as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>


        <div class="col-sm-12 col-lg-4">
            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoPredmetima/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак студената по предметима</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="predmet">Предмет:</label>
                            <select class="form-control auto-combobox" id="predmet" name="predmet">
                                @foreach($predmeti as $predmet)
                                    <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                @foreach($skolskaGodina7 as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>
            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakDiplomiranih/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак дипломираних студената</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 35%;  margin-right: 2%">
                            <label for="from">Од:</label>
                            <input name="from" id="from" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 35%;  margin-right: 2%">
                            <label for="to">До:</label>
                            <input name="to" id="to" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 20%; margin-right: 7%;">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>

            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoSlavama/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак студената по славама</h3>
                    </div>
                    <div class="panel-body">

                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                @foreach($skolskaGodina8 as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>

                    </div>
                </div>
            </form>

            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoProfesorima/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак предмета по професорима</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 20%; margin-right: 7%;">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>

        <div class="col-sm-12 col-lg-4">
            <form role="form" target="_blank" method="post" action="{{ url('/izvestaji/nastavniPlan/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Наставни план</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="program">Студијски програм:</label>
                            <select style="width:250px;" class="form-control" id="program" name="program">
                                @foreach($programPlan as $program)
                                    <option value="{{$program->id}}">{{$program->naziv}}
                                        - {{$program->tipStudija->skrNaziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                @foreach($skolskaGodina as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>

            <form role="form" method="post" target="_blank" action="{{ url('/izvestaji/spisakPoSmerovimaAktivni') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Списак свих активних студената</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group">
                            <label for="skolskaGodina_id">Школска година:</label>
                            <select style="width:130px;" class="form-control" id="skolskaGodina_id" name="godina">
                                @foreach($skolskaGodina9 as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 20%; margin-right: 7%;">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                    </div>
                </div>
            </form>

        </div>


    </div>

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>

    <script>
        $(document).ready(function () {
            //$('#lice').combobox('autocomplete', $("#liceHidden").val());

            $("#from").datepicker({
                dateFormat: 'dd.mm.yy.'
            });

            $("#to").datepicker({
                dateFormat: 'dd.mm.yy.'
            });

        });
    </script>

@endsection