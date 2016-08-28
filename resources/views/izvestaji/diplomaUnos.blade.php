<title>Додавање дипломе</title>
@extends('layouts.layout')
@section('page_heading','Додавање дипломе')
@section('section')

    @if($diploma !== null)

        <div class="col-md-9">
            <form role="form" method="post" action="{{ url('/izvestaji/diplomaAdd') }}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$student->id}}">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Додавање дипломе</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="broj">Број:</label>
                            <input value="{{$diploma->broj}}" name="broj" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="datumOdbrane">Датум:</label>
                            <input id="datumOdbrane" value="{{ date('d.m.Y.',strtotime($diploma->datumOdbrane)) }}" name="datumOdbrane" type="text"
                                   class="form-control dateMask">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="lice">Ментор:</label>
                            <input type="hidden" id="liceHidden" name="liceHidden"
                                   value="{{$diploma->potpis->ime}}  {{$diploma->potpis->prezime}}">
                            <input type="hidden" id="liceIdHidden" name="liceIdHidden" value="{{$diploma->potpis->id}}">
                            <select class="form-control auto-combobox" id="lice" name="lice">
                                @foreach($profesori as $profesori)
                                    <option value="{{$profesori->id}}">{{$profesori->ime}} {{$profesori->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="funkcija">Фукција:</label>
                            <input value="{{$diploma->funkcija}}" name="funkcija" type="text" class="form-control">
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
    @else
        <div class="col-md-9">
            <form role="form" method="post" action="{{ url('/izvestaji/diplomaAdd') }}">
                {{csrf_field()}}
                <input type="hidden" name="id" value="{{$student->id}}">

                <div class="panel panel-success">
                    <div class="panel-heading">
                        <h3 class="panel-title">Додавање дипломе</h3>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="broj">Број:</label>
                            <input name="broj" type="text" class="form-control">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="datumOdbrane">Датум:</label>
                            <input id="datumOdbrane" name="datumOdbrane" type="text" class="form-control dateMask">
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="lice">Ментор:</label>
                            <select class="form-control auto-combobox" id="lice" name="lice">
                                @foreach($profesori as $profesori)
                                    <option value="{{$profesori->id}}">{{$profesori->ime}} {{$profesori->prezime}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <label for="funkcija">Фукција:</label>
                            <input name="funkcija" type="text" class="form-control">
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
    @endif

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>

    <script>
        $(document).ready(function () {
            $('#lice').combobox('autocomplete', $("#liceHidden").val());

            $("#datumOdbrane").datepicker({
                dateFormat: 'dd.mm.yy.'
            });

        });
    </script>

@endsection