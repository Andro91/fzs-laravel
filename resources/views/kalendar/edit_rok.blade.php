@extends('layouts.layout')
@section('page_heading','Измена испитног рока')
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
                <h3 class="panel-title">Измена испитног рока</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{$putanja}}/kalendar/updateRok">
                    {{ csrf_field() }}

                    <input type="hidden" name="rokId" value="{{ $rok->id }}">

                    <div class="form-group" style="width: 40%;">
                        <label for="rok_id">Испитни рок</label>
                        <select class="form-control" id="rok_id" name="rok_id">
                            @foreach($ispitniRok as $tip)
                                <option value="{{$tip->id}}"  {{ $rok->rok_id == $tip->id ? 'selected' : '' }}>{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 40%; margin-right: 2%">
                        <label for="naziv">Назив</label>
                        <input id="naziv" class="form-control" type="text" name="naziv" value="{{ $rok->naziv }}" />
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="formatPocetak">Почетак</label>
                        <input id="formatPocetak" class="form-control dateMask" type="text" name="formatPocetak"
                               value="{{ $rok->pocetak->format('d.m.Y.') }}" />
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="formatKraj">Крај</label>
                        <input id="formatKraj" class="form-control dateMask" type="text" name="formatKraj"
                               value="{{ $rok->kraj->format('d.m.Y.') }}" />
                    </div>

                    <input type="hidden" name="pocetak" id="pocetak" value="{{ $rok->pocetak->format('Y-m-d') }}">
                    <input type="hidden" name="kraj" id="kraj" value="{{ $rok->kraj->format('Y-m-d') }}">

                    <div class="form-group" style="width: 30%;">
                        <label for="tipRoka_id">Тип рока</label>
                        <select class="form-control" id="tipRoka_id" name="tipRoka_id">
                            <option value="1" {{ $rok->tipRoka_id == 1 ? 'selected' : '' }}>Редовни</option>
                            <option value="2" {{ $rok->tipRoka_id == 2 ? 'selected' : '' }}>Ванредни</option>
                        </select>
                    </div>

                    <div class="form-group" style="width: 40%; margin-right: 2%">
                        <label for="komentar">Коментар</label>
                        <input id="komentar" class="form-control" type="text" name="komentar" value="{{ $rok->komentar }}" />
                    </div>

                    <div class="form-group" style="width: 48%; margin-right: 2%;">
                        <label for="indikatorAktivan">
                            <input type="checkbox" id="indikatorAktivan" name="indikatorAktivan" value="1"
                                    {{$rok->indikatorAktivan == 1 ? 'checked' : ''}}>
                            Индикатор активан</label>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group text-center">
                        <button type="submit" name="Submit" class="btn btn-success btn-lg"><span class="fa fa-save"></span> Сачувај</button>
                        <a class="btn btn-danger btn-lg" href="{{ $putanja }}/kalendar/deleteRok/{{ $rok->id }}"><span class="fa fa-trash"> </span> Бриши рок</a>
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
