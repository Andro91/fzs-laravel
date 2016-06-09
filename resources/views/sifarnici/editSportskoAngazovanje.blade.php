<title>Izmeni sportsko angažovanje</title>
@extends('layouts.layout')
@section('page_heading','Izmeni sportsko angažovanje')
@section('section')
    <div class="col-md-9">
        <form role="form" method="post"  action="{{$putanja}}/sportskoAngazovanje/{{$angazovanje->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}

            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Izmeni sportsko angažovanje</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="nazivKluba">Naziv kluba:</label>
                        <input name="nazivKluba" type="text" class="form-control" value="{{$angazovanje->nazivKluba}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="odDoGodina">Od do godina:</label>
                        <input name="odDoGodina" type="text" class="form-control" value="{{$angazovanje->odDoGodina}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="ukupnoGodina">Ukupno godina:</label>
                        <input name="ukupnoGodina" type="text" class="form-control" value="{{$angazovanje->ukupnoGodina}}">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="sport_id">Sport:</label>
                        <input type="hidden" id="sportHidden" name="sportHidden"
                               value="{{$angazovanje->sport_id}}">
                        <select class="form-control" id="sport_id" name="sport_id">
                            @foreach($sport as $sport)
                                <option value="{{$sport->id}}">{{$sport->naziv}}</option>
                            @endforeach
                        </select>
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

    <script>
        $(document).ready(function () {
            $("#sport_id").val($("#sportHidden").val());
        });
    </script>

@endsection