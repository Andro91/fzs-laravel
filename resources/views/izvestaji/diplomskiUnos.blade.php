<title>Дипломски рад - пријава</title>
@extends('layouts.layout')
@section('page_heading','Дипломски рад - пријава')
@section('section')
    @if($diplomski !== null)
    <div class="col-sm-12 col-lg-12">

        <div class="col-sm-12 col-lg-9">
            <form role="form" method="post" action="{{ url('/izvestaji/diplomskiAdd/') }}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$student->id}}">

                <div class="panel panel-success">
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="program">Студијски програм:</label>
                            <input name="program" type="text" value="{{$program->naziv}}" class="form-control" disabled="disabled">
                        </div>
                        <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                            <label for="predmet">Предмет:</label>
                            <input type="hidden" id="predmetHidden" name="predmetHidden" value="{{$diplomski->predmet->naziv}}">
                            <input type="hidden" id="predmetIdHidden" name="predmetIdHidden" value="{{$diplomski->predmet->id}}">
                            <select class="form-control auto-combobox" id="predmet" name="predmet">
                                @foreach($predmeti as $predmet)
                                    <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="ocenaOpis">Оцена описно:</label>
                            <input name="ocenaOpis" value="{{$diplomski->ocenaOpis}}" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="ocenaBroj">Оцена бројчано:</label>
                            <input name="ocenaBroj" value="{{$diplomski->ocenaBroj}}" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="naziv">Тема:</label>
                            <input name="naziv" value="{{$diplomski->naziv}}" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="mentor_id">Ментор:</label>
                            <input type="hidden" id="mentorHidden" name="mentorHidden" value="{{$diplomski->mentor->ime}}  {{$diplomski->mentor->prezime}}">
                            <input type="hidden" id="mentorIdHidden" name="mentorIdHidden" value="{{$diplomski->mentor->id}}">
                            <select class="form-control auto-combobox" id="mentor_id" name="mentor_id">
                                @foreach($profesori as $profesori)
                                    <option value="{{$profesori->id}}">{{$profesori->ime}} {{$profesori->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="clan_id">Члан комисије:</label>
                            <input type="hidden" id="clanHidden" name="clanHidden" value="{{$diplomski->clan->ime}}  {{$diplomski->clan->prezime}}">
                            <input type="hidden" id="clanIdHidden" name="clanIdHidden" value="{{$diplomski->clan->id}}">
                            <select class="form-control auto-combobox" id="clan_id" name="clan_id">
                                @foreach($clan as $clan)
                                    <option value="{{$clan->id}}">{{$clan->ime}} {{$clan->prezime}}</option>
                                @endforeach
                            </select>

                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="predsednik_id">Председник комисије:</label>
                            <input type="hidden" id="predsednikHidden" name="predsednikHidden" value="{{$diplomski->predsednik->ime}}  {{$diplomski->predsednik->prezime}}">
                            <input type="hidden" id="predsednikIdHidden" name="predsednikIdHidden" value="{{$diplomski->predsednik->id}}">
                            <select class="form-control auto-combobox" id="predsednik_id" name="predsednik_id">
                                @foreach($predsednik as $predsednik)
                                    <option value="{{$predsednik->id}}">{{$predsednik->ime}} {{$predsednik->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="datumPrijave">Датум пријаве:</label>
                            <input name="datumPrijave" id="datumPrijave" value="{{ date('d.m.Y.',strtotime($diplomski->datumPrijave)) }}" type="text" class="form-control dateMask">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="datumOdbrane">Датум одбране:</label>
                            <input name="datumOdbrane" id="datumOdbrane" value="{{ date('d.m.Y.',strtotime($diplomski->datumOdbrane)) }}" type="text" class="form-control dateMask">
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <button type="submit" class="btn btn-primary">Сачувај</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    @else

        <div class="col-sm-12 col-lg-12">

            <div class="col-sm-12 col-lg-9">
                <form role="form" method="post" action="{{ url('/izvestaji/diplomskiAdd/') }}">
                    {{csrf_field()}}
                    <input type="hidden" name="id" value="{{$student->id}}">

                    <div class="panel panel-success">
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="program">Студијски програм:</label>
                                <input name="program" type="text" value="{{$program->naziv}}" class="form-control" disabled="disabled">
                            </div>
                            <div class="form-group pull-left" style="width: 70%;  margin-right: 2%">
                                <label for="predmet">Предмет:</label>
                                <select class="form-control auto-combobox" id="predmet" name="predmet">
                                    @foreach($predmeti as $predmet)
                                        <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ocenaOpis">Оцена описно:</label>
                                <input name="ocenaOpis" type="text" class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="ocenaBroj">Оцена бројчано:</label>
                                <input name="ocenaBroj" type="text" class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="naziv">Тема:</label>
                                <input name="naziv" type="text" class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="mentor_id">Ментор:</label>
                                <select class="form-control auto-combobox" id="mentor_id" name="mentor_id">
                                    @foreach($profesori as $profesori)
                                        <option value="{{$profesori->id}}">{{$profesori->ime}} {{$profesori->prezime}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="clan_id">Члан комисије:</label>
                                <select class="form-control auto-combobox" id="clan_id" name="clan_id">
                                    @foreach($clan as $clan)
                                        <option value="{{$clan->id}}">{{$clan->ime}} {{$clan->prezime}}</option>
                                    @endforeach
                                </select>

                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="predsednik_id">Председник комисије:</label>
                                <select class="form-control auto-combobox" id="predsednik_id" name="predsednik_id">
                                    @foreach($predsednik as $predsednik)
                                        <option value="{{$predsednik->id}}">{{$predsednik->ime}} {{$predsednik->prezime}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="datumPrijave">Датум пријаве:</label>
                                <input id="datumPrijave" name="datumPrijave" type="text" class="form-control dateMask">
                            </div>
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <label for="datumOdbrane">Датум одбране:</label>
                                <input id="datumOdbrane" name="datumOdbrane" type="text" class="form-control dateMask">
                            </div>
                        </div>
                        <div class="panel-body">
                            <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                                <button type="submit" class="btn btn-primary">Сачувај</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>

        @endif

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>

    <script>
        $(document).ready(function () {
            $('#mentor_id').combobox('autocomplete', $("#mentorHidden").val());
            $('#clan_id').combobox('autocomplete', $("#clanHidden").val());
            $('#predsednik_id').combobox('autocomplete', $("#predsednikHidden").val());
            $('#predmet').combobox('autocomplete', $("#predmetHidden").val());

            var formatDatum = $("#datumOdbrane");
            formatDatum.datepicker({
                dateFormat: 'dd.mm.yy.',
                altFormat: "yy-mm-dd"
            });

            var formatDatum = $("#datumPrijave");
            formatDatum.datepicker({
                dateFormat: 'dd.mm.yy.',
                altFormat: "yy-mm-dd"
            });

        });
    </script>

@endsection