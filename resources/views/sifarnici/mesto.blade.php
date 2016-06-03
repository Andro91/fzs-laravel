<title>Mesto</title>
@extends('layouts.layout')
@section('page_heading','Mesto')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv
                </th>
                <th>
                    Naziv opštine
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($mesto as $mesto)
                    <tr>
                        <td>{{$mesto->naziv}}</td>
                        <td>{{$mesto->opstina->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="mesto/{{$mesto->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Promeni">
                                </form>
                                <form class="btn" action="mesto/{{$mesto->id}}/delete">
                                    <input type="submit" class="btn btn-primary" value="Izbriši">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <form role="form" method="post" action="{{ url('/mesto/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Mesto</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="opstina_id">Opština:</label>
                        <select class="form-control" id="opstina_id" name="opstina_id">
                            @foreach($opstina as $opstina)
                                <option value="{{$opstina->id}}">{{$opstina->naziv}}</option>
                            @endforeach
                        </select>
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