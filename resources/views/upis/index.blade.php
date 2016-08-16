@extends('layouts.layout')
@section('page_heading',"Упис студента у следећу школску годину")
@section('section')


<div class="col-sm-12 col-lg-10">
    <div id="messages">
        @if (Session::get('flash-error'))
            <div class="alert alert-dismissible alert-danger">
                <button type="button" class="close" data-dismiss="alert">×</button>
                <strong>Грешка!</strong>
                @if(Session::get('flash-error') === 'update')
                    Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                @elseif(Session::get('flash-error') === 'delete')
                    Дошло је до грешке при брисању података! Молимо вас покушајте поново.
                @elseif(Session::get('flash-error') === 'upis')
                    Дошло је до грешке при упису студента! Молимо вас проверите да ли је студент уплатио школарину и покушајте поново.
                @endif
            </div>
        @elseif(Session::get('flash-success'))
            <div class="alert alert-dismissible alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>Успех!</strong>
            @if(Session::get('flash-success') === 'update')
                Подаци о студенту су успешно сачувани.
            @elseif(Session::get('flash-success') === 'delete')
                Подаци о студенту су успешно обрисани.
            @elseif(Session::get('flash-success') === 'upis')
                Упис студента је успешно извршен.
            @endif
            </div>
        @endif
    </div>
    <div>
        <h4>Подаци о студенту</h4>
        <ul class="list-group">
            <li class="list-group-item">Име и презиме:
                <strong>
                    {{ $kandidat->imeKandidata . " " . $kandidat->prezimeKandidata }}
                </strong>
            </li>
            <li class="list-group-item">ЈМБГ:
                <strong>
                    {{ $kandidat->jmbg }}
                </strong>
            </li>
            <li class="list-group-item">Датум рођења:
                <strong>
                    {{ $kandidat->datumRodjenja }}
                </strong>
            </li>
        </ul>
    </div>
    <div>
        <table class="table">
            <thead>
            <tr>
                <th>Година</th>
                <th>Школарина</th>
                <th>Уписан</th>
            </tr>
            </thead>
            <tbody>
                @foreach($upisaneGodine as $godina)
                    <?php
                        $rowClass = "";
                        if($godina->skolarina == 1 && $godina->upisan == 0){
                            $rowClass = "info";
                        }else if($godina->skolarina == 0 && $godina->upisan == 0){
                            $rowClass = "danger";
                        }else{
                            $rowClass = "success";
                        }
                    ?>
                    <tr class="{{ $rowClass }}">
                        <td>{{ $godina->godina }}</td>
                        <td>{{ $godina->skolarina == 1 ? "Уплатио" : "Није уплатио" }}</td>
                        <td>{{ $godina->upisan == 1 ? "Уписан" : "Није уписан" }}</td>
                        <td>
                            <a class="btn btn-primary" {{ $godina->skolarina == 1 ? "disabled" : "" }}
                                href="{{$putanja}}/student/{{ $kandidat->id }}/uplataSkolarine?godina={{ $godina->godina }}">Уплатио школарину
                            </a>
                            <a class="btn btn-success" {{ ($godina->upisan == 1 || $godina->skolarina == 0) ? "disabled" : "" }}
                                href="{{$putanja}}/student/{{ $kandidat->id }}/upisiStudenta?godina={{ $godina->godina }}">Уписао годину
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
