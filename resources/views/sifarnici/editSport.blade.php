<title>Izmeni sport</title>
@extends('layouts.layout')
@section('page_heading','Izmeni sport')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/sport/{{$sport->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tip studija</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$sport->naziv}}">
                    </div>
                    <div class="checkbox">
                        <label>
                            @if($sport->indikatorAktivan == 1)
                                <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                            @else
                                <input name="indikatorAktivan" type="checkbox">
                            @endif
                            Aktivan</label>
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