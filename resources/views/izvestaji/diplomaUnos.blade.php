<title>Додавање дипломе</title>
@extends('layouts.layout')
@section('page_heading','Додавање дипломе')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/izvestaji/diplomaAdd') }}">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$student->id}}" >
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
                        <input name="datumOdbrane" type="text" class="form-control">
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
                        <label for="lice">Лице:</label>
                        <input name="lice" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="funkcija">Фукција:</label>
                        <input name="funkcija" type="text" class="form-control">
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