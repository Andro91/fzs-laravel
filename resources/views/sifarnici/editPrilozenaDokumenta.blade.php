<title>Promeni priložena dokumenta</title>
@extends('layouts.layout')
@section('page_heading','Promeni priložena dokumenta')
@section('section')


        <form role="form" method="post" action="/prilozenaDokumenta/{{$dokument->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Promeni priložena dokumenta</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="redniBrojDokumenta">Redni broj:</label>
                        <input name="redniBrojDokumenta" type="text" class="form-control" value="{{$dokument->redniBrojDokumenta}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Naziv:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$dokument->naziv}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="indGodina">Godina:</label>
                        <input name="indGodina" type="text" class="form-control" value="{{$dokument->indGodina}}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Izmeni</button>
                    </div>
                </div>
            </div>
        </form>



@endsection