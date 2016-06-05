<title>Studijski program</title>
@extends('layouts.layout')
@section('page_heading','Studijski program')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
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
                <th>
                    Akcije
                </th>
                </thead>
                @foreach($studijskiProgram as $studijskiProgram)
                    <tr>
                        <td>{{$studijskiProgram->naziv}}</td>
                        <td>{{$studijskiProgram->skrNazivStudijskogPrograma}}</td>
                        <td>{{$studijskiProgram->tipStudija->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="studijskiProgram/{{$studijskiProgram->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="studijskiProgram/{{$studijskiProgram->id}}/delete">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/studijskiProgram/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Studijski program</h3>
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
                        <input name="indikatorAktivan" type="checkbox" class="form-control checkbox">
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