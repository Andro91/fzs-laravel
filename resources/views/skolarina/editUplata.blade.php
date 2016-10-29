@extends('layouts.layout')
@section('page_heading','Измена уплате')
@section('section')
    <div class="col-lg-9">
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Измена уплате</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{$putanja}}/uplata/store">
                    {{ csrf_field() }}

                    <input type="hidden" name="id" id="id" value="{{ $uplata->id }}">
                    <input type="hidden" name="skolarina_id" id="skolarina_id" value="{{ $skolarina->id }}">
                    <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="iznos">Износ</label>
                            <input id="iznos" class="form-control" type="text" name="iznos" value="{{ $uplata->iznos }}" />
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="naziv">Назив</label>
                            <input id="naziv" class="form-control" type="text" name="naziv" value="{{ $uplata->naziv }}" />
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-4">
                            <label for="formatDatum">Датум уплате</label>
                            <input id="formatDatum" class="form-control dateMask" type="text" name="formatDatum"
                                   value="{{ $uplata->datum->format('d.m.Y.') }}"/>
                        </div>
                        <input type="hidden" name="datum" id="datum" value="{{ $uplata->datum }}">
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-lg"><span class="fa fa-save"></span> Сачувај</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        $(function () {
            $("#formatDatum").datepicker({
                dateFormat: 'dd.mm.yy.',
                altField: "#datum",
                altFormat: "yy-mm-dd"
            });
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection
