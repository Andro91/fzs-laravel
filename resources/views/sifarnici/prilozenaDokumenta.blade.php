<title>Приложена документа</title>
@extends('layouts.layout')
@section('page_heading','Приложена документа')
@section('section')

    <div>
        <form class="btn" method="GET" action="{{$putanja}}/prilozenaDokumenta/add">
            <input type="submit" class="btn btn-primary" value="Додавање">
        </form>
    </div>

    <br/>
    <div class="col-md-9">
        <div class="table-responsive">
            <table id="tabela" class="table">
                <thead>
                <th>
                    Редни број
                </th>
                <th>
                    Назив
                </th>
                <th>
                    Година
                </th>
                <th>
                    Акције
                </th>
                </thead>

                @foreach($dokument as $dokument)
                    <tr>
                        <td>{{$dokument->redniBrojDokumenta}}</td>
                        <td>{{$dokument->naziv}}</td>
                        <td>{{$dokument->godinaStudija->naziv}}</td>
                        <td>
                            <div class="btn-group">
                                <form class="btn" action="prilozenaDokumenta/{{$dokument->id}}/edit">
                                    <input type="submit" class="btn btn-primary" value="Измени">
                                </form>
                                <form onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке?');" class="btn" action="prilozenaDokumenta/{{$dokument->id}}/delete">
                                    <input type="submit" class="btn btn-danger" value="Обриши">
                                </form>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <br/>
        <br/>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>

@endsection