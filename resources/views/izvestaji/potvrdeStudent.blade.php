<title>Потврде</title>
@extends('layouts.layout')
@section('page_heading','Потврде')
@section('section')

    <div class="col-md-9">

        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title"></h3>
            </div>
            <div class="panel-body">
                <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                    <a class="btn btn-primary form-group"
                       href="{{$putanja}}/izvestaji/{{$student->id}}/diplomaUnos">Унос података за
                        уверење</a>
                </div>
                <div class="form-group pull-left" style="width: 48%;">
                    <input type="hidden" value="{{$student->id}}">
                    <a class="btn btn-primary form-group" target="_blank"
                       href="{{$putanja}}/izvestaji/diplomaStampa/{{$student->id}}">Штампа
                        уверења</a>
                </div>

                <div class="form-group pull-left" style="width: 48%; margin-right: 2%">
                    <a class="btn btn-primary form-group"
                       href="{{$putanja}}/izvestaji/diplomskiUnos/{{$student->id}}">Унос података за
                        дипломски</a>
                </div>

                <div class="form-group pull-left" style="width: 48%; ">
                    <a target="_blank" class="btn btn-primary" href="{{$putanja}}/izvestaji/komisijaStampa/{{$student->id}}">
                        Комисија
                    </a>
                </div>

                <div class="form-group pull-left" style="width: 48%;">
                    <a target="_blank" class="btn btn-primary" href="{{$putanja}}/izvestaji/polozeniStampa/{{$student->id}}">
                        Уверење о положеним испитима
                    </a>
                </div>
            </div>
            <div class="panel-body">

            </div>
        </div>

    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection