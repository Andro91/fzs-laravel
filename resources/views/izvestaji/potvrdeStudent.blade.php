<title>Потврде</title>
@extends('layouts.layout')
@section('page_heading','Потврде')
@section('section')

    <div class="col-md-9">

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 25%; margin-right: 2%;">
                    <form role="form" method="post" action="{{ url('/izvestaji/spisakZaPredmet/') }}">
                        {{csrf_field()}}
                        <button type="submit" class="btn btn-primary">Уверење о положеним испитима</button>
                    </form>
                </div>
                <div class="form-group pull-left" style="width: 25%; margin-right: 2%;">
                    <form role="form" method="post" action="{{ url('/izvestaji/spisakZaPredmet/') }}">
                        <button type="submit" class="btn btn-primary">Уверење о стеченом образовању</button>
                    </form>
                </div>
                <div class="form-group pull-left" style="width: 25%; margin-right: 2%;">
                    <form role="form" method="post" action="{{ url('/izvestaji/spisakZaPredmet/') }}">
                        <button type="submit" class="btn btn-primary">Записник са одбране дипломског рада</button>
                    </form>
                </div>
            </div>
            <div class="panel-body">

            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection