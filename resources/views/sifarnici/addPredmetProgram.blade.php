<title>Додавање програма</title>
@extends('layouts.layout')
@section('page_heading','Додавање програма')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/predmet/addProgramUnos') }}">
            {{csrf_field()}}

            <input type="hidden" id="predmet_id" name="predmet_id" value="{{$predmet->id}}">

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
                    <h3 class="panel-title">Програм</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="program_id">Програм:</label>
                        <select class="form-control auto-combobox" id="program_id" name="program_id" required>
                            @foreach($programi as $program)
                                <option value="{{$program->id}}">{{$program->naziv}}
                                    - {{$program->tipStudija->skrNaziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="godinaStudija_id">Година:</label>
                        <select class="form-control" id="godinaStudija_id" name="godinaStudija_id">
                            @foreach($godinaStudija as $godinaStudija)
                                <option value="{{$godinaStudija->id}}">{{$godinaStudija->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="semestar">Семестар:</label>
                        <select class="form-control" id="semestar" name="semestar">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipPredmeta_id">Тип предмета:</label>
                        <select class="form-control" id="tipPredmeta_id" name="tipPredmeta_id">
                            @foreach($tipPredmeta as $tipPredmeta)
                                <option value="{{$tipPredmeta->id}}">{{$tipPredmeta->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="skolskaGodina_id">Школска година:</label>
                        <select class="form-control" id="skolskaGodina_id" name="skolskaGodina_id">
                            @foreach($skolskaGodina as $skolskaGodina)
                                <option value="{{$skolskaGodina->id}}">{{$skolskaGodina->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="espb">ЕСПБ:</label>
                        <input name="espb" type="number" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="predavanja">Часови предавања:</label>
                        <input name="predavanja" type="number" class="form-control"">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="vezbe">Часови вежби:</label>
                        <input name="vezbe" type="number" class="form-control"">
                    </div>
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Додај</button>
                </div>
            </div>
        </form>
    </div>

    </div>

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>


@endsection