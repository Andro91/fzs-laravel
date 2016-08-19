<title>Додавање предметa</title>
@extends('layouts.layout')
@section('page_heading','Додавање предметa')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/profesor/addPredmetUnos') }}">
            {{csrf_field()}}

           <input type="hidden" id="profesor_id" name="profesor_id" value="{{$profesor->id}}">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Предмет</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="predmet_id">Предмет:</label>
                        <select class="form-control" id="predmet_id" name="predmet_id">
                            @foreach($predmet as $predmet)
                                <option value="{{$predmet->id}}">{{$predmet->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="semestar_id">Семестар:</label>
                        <select class="form-control" id="semestar_id" name="semestar_id">
                            @foreach($semestar as $semestar)
                                <option value="{{$semestar->id}}">{{$semestar->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="oblikNastave_id">Облик наставе:</label>
                        <select class="form-control" id="oblikNastave_id" name="oblikNastave_id">
                            @foreach($oblik as $oblik)
                                <option value="{{$oblik->id}}">{{$oblik->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Додај</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection