<title>Sportovi</title>
@extends('layouts.layout')
@section('page_heading','Sportovi')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($sport as $sport)
                    <tr>
                        <td>{{$sport->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="sport/{{$sport->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="sport/{{$sport->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>

        <form role="form" method="post" action="{{ url('/sport/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Sport</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                <input name="indikatorAktivan" type="checkbox">
                                Aktivan</label>
                        </div>
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