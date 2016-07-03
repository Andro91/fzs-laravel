<title>Измени бодовање</title>
@extends('layouts.layout')
@section('page_heading','Измени бодовање')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{$putanja}}/bodovanje/{{$bodovanje->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени бодовање</h3>
                </div>
                <div class="panel-body">

                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="opisnaOcena">Описна оцена:</label>
                        <input name="opisnaOcena" type="text" class="form-control" value="{{$bodovanje->opisnaOcena}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="poeniMin">Минимум поена:</label>
                        <input name="poeniMin" type="number" class="form-control" value="{{$bodovanje->poeniMin}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="poeniMax">Максимум поена:</label>
                        <input name="poeniMax" type="number" class="form-control" value="{{$bodovanje->poeniMax}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="ocena">Оцена:</label>
                        <input name="ocena" type="number" class="form-control" value="{{$bodovanje->ocena}}">
                    </div>

                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <div class="checkbox">
                            <label>
                                @if($bodovanje->indikatorAktivan == 1)
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


@endsection