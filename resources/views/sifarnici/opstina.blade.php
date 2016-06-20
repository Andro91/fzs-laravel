<title>Општина</title>
@extends('layouts.layout')
@section('page_heading','Општина')
@section('section')

    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Назив
                </th>
                <th>
                    Назив региона
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($opstina as $opstina)
                    <tr>
                        <td>{{$opstina->naziv}}</td>
                        <td>
                            @if($opstina->region)
                                {{$opstina->region->naziv}}
                            @else
                                Prazno
                            @endif
                        </td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="opstina/{{$opstina->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');" class="btn" action="opstina/{{$opstina->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <form role="form" method="post" action="{{ url('/opstina/unos') }}">
            {{csrf_field()}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Општина</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 48%;  margin-right: 2%">
                        <label for="region_id">Регион:</label>
                        <select class="form-control" id="region_id" name="region_id">
                            @foreach($region as $region)
                                <option value="{{$region->id}}">{{$region->naziv}}</option>
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

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection