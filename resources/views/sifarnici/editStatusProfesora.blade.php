<title>Промена статуса професора</title>
@extends('layouts.layout')
@section('page_heading','Промена статуса професора')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{$putanja}}/statusProfesora/{{$status->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Промена статуса професора</h3>
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
                        <button type="submit" class="btn btn-primary">Промени</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

@endsection