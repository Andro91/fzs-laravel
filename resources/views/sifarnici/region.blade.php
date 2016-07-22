<title>Регион</title>
@extends('layouts.layout')
@section('page_heading','Регион')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/region/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>
    <br/>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Naziv
                </th>
                <th>
                    Akcije
                </th>
                </thead>

                @foreach($region as $region)
                    <tr>
                        <td>{{$region->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="region/{{$region->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="region/{{$region->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection