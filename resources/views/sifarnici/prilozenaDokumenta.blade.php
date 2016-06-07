<title>Priložena dokumenta</title>
@extends('layouts.layout')
@section('page_heading','Priložena dokumenta')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Redni broj
                </th>
                <th>
                    Naziv
                </th>
                <th>
                    Godina
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($dokument as $dokument)
                    <tr>
                        <td>{{$dokument->redniBrojDokumenta}}</td>
                        <td>{{$dokument->naziv}}</td>
                        <td>{{$dokument->indGodina}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="prilozenaDokumenta/{{$dokument->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="prilozenaDokumenta/{{$dokument->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <br/>
        <form role="form" method="post" action="{{ url('/prilozenaDokumenta/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Priložena dokumenta</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="redniBrojDokumenta">Redni broj:</label>
                        <input name="redniBrojDokumenta" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="indGodina">Godina:</label>
                        <input name="indGodina" type="text" class="form-control">
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