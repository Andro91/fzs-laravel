<title>Додавање предметa</title>
@extends('layouts.layout')
@section('page_heading','Додавање програма')
@section('section')

    <div class="col-md-9">
        <form role="form" method="post" action="{{ url('/predmet/addProgramUnos') }}">
            {{csrf_field()}}

            <input type="hidden" id="predmet_id" name="predmet_id" value="{{$predmet->id}}">
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Програм</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="program_id">Предмет:</label>
                        <select class="form-control auto-combobox" id="program_id" name="program_id" required>
                            @foreach($programi as $program)
                                <option value="{{$program->id}}">{{$program->naziv}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Додај</button>
                    </div>
                </div>
            </div>
        </form>
    </div>

    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>


@endsection