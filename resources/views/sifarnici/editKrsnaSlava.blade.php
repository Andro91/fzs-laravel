<title>Izmena krsne slave</title>
@extends('layouts.layout')
@section('page_heading','Izmena krsne slave')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/krsnaSlava/{{$krsnaSlava->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Krsna slava</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$krsnaSlava->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Datum:</label>
                        <input name="datumSlave" type="date" class="form-control" value="{{$krsnaSlava->datumSlave}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Aktivan:</label>
                        @if($krsnaSlava->indikatorAktivan == 1)
                            <input name="indikatorAktivan" type="checkbox" checked="true" class="form-control">
                        @else
                            <input name="indikatorAktivan" type="checkbox" class="form-control">
                        @endif
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Izmeni</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection