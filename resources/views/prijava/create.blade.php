@extends('layouts.layout')
@section('page_heading','Пријава за полагање испита')
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
    <div class="panel panel-primary">
        <div class="panel-heading">
            <h3 class="panel-title">Пријава за полагање испита</h3>
        </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/prijava') }}">
                    {{ csrf_field() }}

                    <input type="hidden" name="kandidat_id" value="{{ $kandidat->id }}">

                    <div class="form-group" style="width: 30%;">
                        <label for="brojIndeksa">Број Индекса</label>
                        <input id="brojIndeksa" class="form-control" type="text" name="brojIndeksa" value="{{ $kandidat->brojIndeksa }}" />
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="jmbg">ЈМБГ</label>
                        <input id="jmbg" class="form-control" type="text" name="jmbg" value="{{ $kandidat->jmbg }}" />
                    </div>

                    <div class="form-group" style="width: 50%;">
                        <label for="StudijskiProgram">Студијски програм</label>
                        <select class="form-control" id="StudijskiProgram" name="StudijskiProgram">
                            @foreach($studijskiProgram as $item)
                                <option value="{{ $item->id }}" {{ ($kandidat->studijskiProgram_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pull-left" style="width: 40%; margin-right: 2%">
                        <label for="imeKandidata">Име</label>
                        <input id="imeKandidata" class="form-control" type="text" name="imeKandidata" value="{{ $kandidat->imeKandidata }}" />
                    </div>

                    <div class="form-group pull-left" style="width: 40%;">
                        <label for="prezimeKandidata">Презиме</label>
                        <input id="prezimeKandidata" class="form-control" type="text" name="prezimeKandidata" value="{{ $kandidat->prezimeKandidata }}" />
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group" style="width: 80%;">
                        <label for="predmet_id">Пријављујем се за полагање испита из предмета</label>
                        <select class="form-control" id="predmet_id" name="predmet_id">
                            @foreach($predmeti as $item)
                                <option value="{{ $item->id }}">{{ $item->naziv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 48%;  margin-right: 2%">
                        <label for="tipPredmeta_id">Тип предмета:</label>
                        <select class="form-control" id="tipPredmeta_id" name="tipPredmeta_id">
                            @foreach($tipPredmeta as $tip)
                                <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 48%; margin-right: 2%;">
                        <label for="godinaStudija_id">Година студија</label>
                        <select class="form-control" id="godinaStudija_id" name="godinaStudija_id"
                                style="max-width: 40%">
                            @foreach($godinaStudija as $item)
                                <option value="{{ $item->id }}" {{ ($kandidat->godinaStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group" style="width: 50%;">
                        <label for="tipStudija_id">Тип студија:</label>
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($tipStudija as $tip)
                                <option value="{{$tip->id}}" {{ ($kandidat->tipStudija_id == $tip->id ? "selected":"") }}>{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group" style="width: 80%;">
                        <label for="tipStudija_id">Професор</label>
                        <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                            @foreach($profesor as $tip)
                                <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pull-left" style="width: 40%; margin-right: 10%">
                        <label for="rok_id">Испитни рок</label>
                        <select class="form-control" id="rok_id" name="rok_id">
                            @foreach($ispitniRok as $tip)
                                <option value="{{$tip->id}}">{{$tip->naziv}}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group pull-left" style="width: 30%;">
                        <label for="brojPolaganja">Ипит полажем (редни број полагања)</label>
                        <input id="brojPolaganja" class="form-control" type="text" name="brojPolaganja" value="" />
                    </div>

                    <div class="form-group" style="width: 30%;">
                        <label for="datum">Датум</label>
                        <input id="datum" class="form-control" type="text" name="datum" value="{{ Carbon\Carbon::now()->format('d.m.Y.') }}" />
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
<script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection