<title>Додавање бодовања</title>
@extends('layouts.layout')
@section('page_heading','Додавање бодовања')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/bodovanje/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Бодовање</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="opisnaOcena">Описна оцена:</label>
                        <input name="opisnaOcena" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="poeniMin">Минимум поена:</label>
                        <input name="poeniMin" type="number" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="poeniMax">Максимум поена:</label>
                        <input name="poeniMax" type="number" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="ocena">Оцена:</label>
                        <input name="ocena" type="number" class="form-control">
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