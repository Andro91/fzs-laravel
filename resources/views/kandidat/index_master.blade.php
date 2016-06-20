@extends('layouts.layout')
@section('page_heading','Преглед кандидата за мастер студије')
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
                            <a class="btn btn-primary pull-left" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>
                            <form class="pull-left" style="margin-left: 10px" action="{{$putanja}}/master/{{$kandidat->id}}/delete" 
                            method="post" onsubmit="return confirm('Да ли сте сигурни да желите да обришете податке овог кандидата?');">
                                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                                {{ csrf_field() }}
                                <input type="submit" class="btn btn-danger" value="Бриши" >
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
