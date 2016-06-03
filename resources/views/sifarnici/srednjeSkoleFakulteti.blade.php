<title>Srednje škole i fakulteti</title>
@extends('layouts.layout')
@section('page_heading','Srednje škole i fakulteti')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv srednje škole/fakulteta
                </th>
                <th>
                    Indikator
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($srednjeSkoleFakulteti as $srednjeSkoleFakulteti)
                    <tr>
                        <td>{{$srednjeSkoleFakulteti->naziv}}</td>
                        <td>{{$srednjeSkoleFakulteti->indSkoleFakulteta}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="srednjeSkoleFakulteti/edit/{{$srednjeSkoleFakulteti->id}}">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="srednjeSkoleFakulteti/delete/{{$srednjeSkoleFakulteti->id}}">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <form role="form" method="post" action="{{ url('/srednjeSkoleFakulteti/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Srednje škole i fakulteti</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Indikator:</label>
                        <input name="indSkoleFakulteta" type="text" class="form-control">
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