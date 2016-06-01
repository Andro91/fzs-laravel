<title>Krsna slava</title>
@extends('layouts.layout')
@section('page_heading','Krsna slava')
@section('section')

    <div class="table-responsive">
        <table class="table">
            <thead>
            <th>
                Naziv
            </th>
            <th>
                Datum
            </th>
            </thead>

            @foreach($krsnaSlava as $krsnaSlava)
                <tr>
                    <td>{{$krsnaSlava->naziv}}</td>
                    <td>{{$krsnaSlava->datumSlave}}</td>
                </tr>
            @endforeach
        </table>
    </div>
    <form role="form" method="post" action="{{ url('/krsnaSlava/unos') }}">
        {{csrf_field()}}

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Krsna slava</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Naziv:</label>
                    <input name="naziv" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Datum:</label>
                    <input name="datumSlave" type="date" class="form-control">
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