@extends('layouts.layout')
@section('page_heading','Нови испитни рок')
@section('section')

    <div class="container">
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
        @if (Session::get('flash-error'))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Грешка!</strong>
                @if(Session::get('flash-error') === 'create')
                    Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                @endif
            </div>
        @endif
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Нови испитни рок</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/kalendar/storeRok') }}">
                    {{ csrf_field() }}

                    <div class="form-group" style="width: 40%;">
                        <label for="rok_id">Испитни рок</label>
                        <select class="form-control" id="rok_id" name="rok_id">
                            @foreach($ispitniRok as $tip)
                                <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="formatPocetak">Почетак</label>
                        <input id="formatPocetak" class="form-control dateMask" type="text" name="formatPocetak" value="" />
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="formatKraj">Крај</label>
                        <input id="formatKraj" class="form-control dateMask" type="text" name="formatKraj" value="" />
                    </div>

                    <input type="hidden" name="pocetak" id="pocetak">
                    <input type="hidden" name="kraj" id="kraj">

                    <div class="form-group" style="width: 30%;">
                        <label for="tipRoka_id">Тип рока</label>
                        <select class="form-control" id="tipRoka_id" name="tipRoka_id">
                            <option value="1">Редовни</option>
                            <option value="2">Ванредни</option>
                        </select>
                    </div>

                    <div class="form-group" style="width: 40%; margin-right: 2%">
                        <label for="komentar">Коментар</label>
                        <input id="komentar" class="form-control" type="text" name="komentar" value="" />
                    </div>

                    <div class="form-group" style="width: 48%; margin-right: 2%;">
                        <label for="indikatorAktivan">
                            <input type="checkbox" id="indikatorAktivan" name="indikatorAktivan" value="1">
                            Индикатор активан</label>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-success btn-lg"><span class="fa fa-save"></span> Сачувај</button>
                    </div>

                </form>
            </div>
        </div>
    </div>
    <script>
        $( function() {
            $( "#formatPocetak" ).datepicker({
                dateFormat: 'dd.mm.yy.',
                altField : "#pocetak",
                altFormat: "yy-mm-dd"
            });

            $( "#formatKraj" ).datepicker({
                dateFormat: 'dd.mm.yy.',
                altField : "#kraj",
                altFormat: "yy-mm-dd"
            });

        } );
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection
