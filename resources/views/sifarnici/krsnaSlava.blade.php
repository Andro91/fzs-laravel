<title>Krsna slava</title>
@extends('layouts.layout')
@section('page_heading','Krsna slava')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv
                </th>
                <th>
                    Datum
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($krsnaSlava as $krsnaSlava)
                    <tr>
                        <td>{{$krsnaSlava->naziv}}</td>
                        <td>{{$krsnaSlava->datumSlave}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="krsnaSlava/{{$krsnaSlava->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="krsnaSlava/{{$krsnaSlava->id}}/delete">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
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
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection