<title>Izmeni tip studija</title>
@extends('layouts.layout')
@section('page_heading','Izmeni tip studija')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/tipStudija/{{$tipStudija->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Tip studija</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$tipStudija->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Skra?eni naziv:</label>
                        <input name="skrNaziv" type="text" class="form-control" value="{{$tipStudija->skrNaziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($tipStudija->indikatorAktivan == 1)
                                    <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                                @else
                                    <input name="indikatorAktivan" type="checkbox">
                                @endif
                                Aktivan</label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Promeni</button>
                    </div>
                </div>
            </div>
        </form>
    </div>


@endsection