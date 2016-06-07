<title>Izmena godine studija</title>
@extends('layouts.layout')
@section('page_heading','Godina studija')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="/godinaStudija/{{$godinaStudija->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Izmena godine studija</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$godinaStudija->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Rimski naziv:</label>
                        <input name="nazivRimski" type="text" class="form-control"
                               value="{{$godinaStudija->nazivRimski}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv u padežu:</label>
                        <input name="nazivSlovimaUPadezu" type="text" class="form-control"
                               value="{{$godinaStudija->nazivSlovimaUPadezu}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Redosled prikazivanja:</label>
                        <input name="redosledPrikazivanja" type="text" class="form-control"
                               value="{{$godinaStudija->redosledPrikazivanja}}">
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
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <button type="submit" class="btn btn-primary">Izmeni</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection