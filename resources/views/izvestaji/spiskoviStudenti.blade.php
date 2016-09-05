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
                        <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                            <label for="program">Студијски програм:</label>
                            <select class="form-control" id="program" name="program">
                                @foreach($program as $program)
                                    <option value="{{$program->id}}">{{$program->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 30%;  margin-right: 2%">
                            <label for="godina">Година студија:</label>
                            <select class="form-control" id="godina" name="godina">
                                @foreach($godina as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 20%; margin-right: 20%;">
                            <button type="submit" class="btn btn-primary">Штампај</button>
                        </div>
                        <div class="form-group pull-left" style="width: 20%;">
                            <a class="btn btn-primary pull-left" target="_blank"
                               href="{{$putanja}}/izvestaji/spisakPoSmerovimaAktivni">Сви</a>
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
                        <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                            <label for="predmet">Предмет:</label>
                            <select class="form-control auto-combobox" id="predmet" name="predmet">
                                @foreach($predmeti as $predmet)
                                    <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
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

        </div>

        <div class="col-sm-12 col-lg-4">
            <form role="form" target="_blank" method="post" action="{{ url('/izvestaji/nastavniPlan/') }}">
                {{csrf_field()}}

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Наставни план</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                            <label for="program">Студијски програм:</label>
                            <select class="form-control" id="program" name="program">
                                @foreach($programPlan as $program)
                                    <option value="{{$program->id}}">{{$program->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 30%;  margin-right: 2%">
                            <label for="godina">Година студија:</label>
                            <select class="form-control" id="godina" name="godina">
                                @foreach($godinaPlan as $godina)
                                    <option value="{{$godina->id}}">{{$godina->naziv}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="panel-body">
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