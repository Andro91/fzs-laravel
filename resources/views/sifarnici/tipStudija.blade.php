<title>Тип студија</title>
@extends('layouts.layout')
@section('page_heading','Тип студија')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Скраћени назив
                </th>
                <th>
                    Акције
                </th>
                </thead>
                @foreach($tipStudija as $tipStudija)
                    <tr>
                        <td>{{$tipStudija->naziv}}</td>
                        <td>{{$tipStudija->skrNaziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="tipStudija/{{$tipStudija->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form class="btn" action="tipStudija/{{$tipStudija->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>

        <form role="form" method="post" action="{{ url('/tipStudija/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Тип студија</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Скраћени назив:</label>
                        <input name="skrNaziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                <input name="indikatorAktivan" type="checkbox">
                                Активан</label>
                        </div>
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