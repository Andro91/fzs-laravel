<title>Измена године студија</title>
@extends('layouts.layout')
@section('page_heading','Измена године студија')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{$putanja}}/godinaStudija/{{$godinaStudija->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измена године студија</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$godinaStudija->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Римски назив:</label>
                        <input name="nazivRimski" type="text" class="form-control"
                               value="{{$godinaStudija->nazivRimski}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив у падежу:</label>
                        <input name="nazivSlovimaUPadezu" type="text" class="form-control"
                               value="{{$godinaStudija->nazivSlovimaUPadezu}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Редослед приказивања:</label>
                        <input name="redosledPrikazivanja" type="text" class="form-control"
                               value="{{$godinaStudija->redosledPrikazivanja}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($godinaStudija->indikatorAktivan == 1)
                                    <input name="indikatorAktivan" value="1" type="checkbox" checked="true">
                                @else
                                    <input name="indikatorAktivan" type="checkbox">
                                @endif
                                Активан</label>
                        </div>
                    </div>
                    <div class="panel-body">
                        <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                            <button type="submit" class="btn btn-primary">Измени</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection