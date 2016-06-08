<title>Регион</title>
@extends('layouts.layout')
@section('page_heading','Регион')
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

                @foreach($region as $region)
                    <tr>
                        <td>{{$region->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="region/{{$region->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form class="btn" action="region/{{$region->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/region/unos') }}">
            {{csrf_field()}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Регион</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
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

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection