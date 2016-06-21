<title>Додавање крснe славe</title>
@extends('layouts.layout')
@section('page_heading','Додавање крснe славe')
@section('section')

    <form role="form" method="post" action="{{ url('/krsnaSlava/unos') }}">
        {{csrf_field()}}

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Крсна слава</h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Назив:</label>
                    <input name="naziv" type="text" class="form-control">
                </div>
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <label for="naziv">Датум:</label>
                    <input id="datumSlave" name="datumSlave" type="text" class="form-control">
                </div>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <button type="submit" class="btn btn-primary">Додај</button>
                </div>
            </div>
        </div>
    </form>


    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
    <script>
        $(document).ready(function () {
            $.mask.definitions['q'] = '[0-3]';
            $.mask.definitions['w'] = '[0-9]';
            $.mask.definitions['e'] = '[0-1]';
            $('#datumSlave').mask("qw.ew.");
        });
    </script>

@endsection