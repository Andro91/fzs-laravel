@extends('layouts.layout')
@section('page_heading','Преглед кандидата за основне студије')
@section('section')

        <!--<script type="text/javascript" src="{{ URL::asset('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css') }}"></script>-->
<!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>-->

<div class="col-sm-12 col-lg-10">
    <table id="tabela" class="table">
        <thead>
        <th>Име</th>
        <th>Презиме</th>
        <th>ЈМБГ</th>
        <th>Измена</th>
        </thead>
        <tbody>
        @foreach($kandidati as $kandidat)
            <tr>
                <td>{{$kandidat->imeKandidata}}</td>
                <td>{{$kandidat->prezimeKandidata}}</td>
                <td>{{$kandidat->jmbg}}</td>
                <td>
                    <a class="btn btn-primary pull-left" href="{{$putanja}}/kandidat/{{ $kandidat->id }}/edit">Измени</a>

                    <form class="pull-left" style="margin-left: 10px" action="{{$putanja}}/kandidat/{{ $kandidat->id }}"
                          method="post" onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger" value="Бриши">
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <br/>

<div class="panel panel-primary">
    <div class="panel-heading">
        <h3 class="panel-title">Штампање ранг листа</h3>
    </div>
    <div class="panel-body">
            {{ csrf_field() }}

            <div class="form-group pull-left" style="width: 25%;">
                <a class="btn btn-primary pull-left" target="_blank" href="{{$putanja}}/izvestaji/spisakPoSmerovima">Студијски програми</a>
            </div>
    </div>
</div>


<script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
