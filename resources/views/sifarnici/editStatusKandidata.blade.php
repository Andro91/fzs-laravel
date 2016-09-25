<title>Измени статус кандидата</title>
@extends('layouts.layout')
@section('page_heading','Измени статус кандидата')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{$putanja}}/statusKandidata/{{$status->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени статус кандидата</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$status->naziv}}">
                    </div>

                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($status->indikatorAktivan == 1)
                                    <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                                @else
                                    <input name="indikatorAktivan" type="checkbox">
                                @endif
                                Активан</label>
                        </div>
                    </div>

                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Измени</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            $.mask.definitions['q'] = '[0-3]';
            $.mask.definitions['w'] = '[0-9]';
            $.mask.definitions['z'] = '[0-2]';
            $.mask.definitions['e'] = '[0-1]';
            $('#datum').mask("qw.ez.9999.");
        });
    </script>


@endsection