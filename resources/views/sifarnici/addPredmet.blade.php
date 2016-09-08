<title>Додавање предметa</title>
@extends('layouts.layout')
@section('page_heading','Додавање предметa')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/predmet/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Предмет</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="tipPredmeta_id">Тип предмета:</label>
                        <select class="form-control" id="tipPredmeta_id" name="tipPredmeta_id">
                            @foreach($tipPredmeta as $tipPredmeta)
                                <option value="{{$tipPredmeta->id}}">{{$tipPredmeta->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">ЕСПБ:</label>
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
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Додај</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection