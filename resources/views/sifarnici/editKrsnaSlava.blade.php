<title>Измени крсну славу</title>
@extends('layouts.layout')
@section('page_heading','Измени крсну славу')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{$putanja}}/krsnaSlava/{{$krsnaSlava->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени крсну славу</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив</label>
                        <input name="naziv" type="text" class="form-control" value="{{$krsnaSlava->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Датум</label>
                        <input id="datumSlave" name="datumSlave" type="text" class="form-control" value="{{ $krsnaSlava->datumSlave}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($krsnaSlava->indikatorAktivan == 1)
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
        $.mask.definitions['q'] = '[0-3]';
        $.mask.definitions['w'] = '[0-9]';
        $.mask.definitions['e'] = '[0-1]';
        $('#datumSlave').mask("qw.ew");
    </script>

@endsection