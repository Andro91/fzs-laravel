<title>Studijski program</title>
@extends('layouts.layout')
@section('page_heading','Studijski program')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Skraćeni naziv
            </th>
            <th>
                Tip studija
            </th>
            </thead>
            @foreach($studijskiProgram as $studijskiProgram)
                <tr>
                    <td>{{$studijskiProgram->naziv}}</td>
                    <td>{{$studijskiProgram->skrNazivStudijskogPrograma}}</td>
                    <td>{{$studijskiProgram->tipStudija->naziv}}</td>
                </tr>
            @endforeach
        </table>
    </div>

    <form role="form" method="post" action="{{ url('/studijskiProgram/unos') }}">
        {{csrf_field()}}


        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Tip studija</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Naziv:</label>
                    <input name="naziv" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Skraćeni naziv:</label>
                    <input name="skrNazivStudijskogPrograma" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                    <label for="tipStudija_id">Tip studijskog programa:</label>
                    <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                        @foreach($tipStudija as $tipStudija)
                            <option value="{{$tipStudija->id}}">{{$tipStudija->naziv}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Aktivan:</label>
                    <input name="indikatorAktivan" type="checkbox" class="form-control">
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Dodaj</button>
                </div>
            </div>
        </div>
    </form>

@endsection