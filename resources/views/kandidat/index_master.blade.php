@extends('layouts.layout')
@section('page_heading','Преглед кандидата за мастер студије')
@section('section')

    <!--<script type="text/javascript" src="{{ URL::asset('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css') }}"></script>-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>-->

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
                    @endif
                </div>
            @elseif(Session::get('flash-success'))
                <div class="alert alert-dismissible alert-success">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Успех!</strong>
                    @if(Session::get('flash-success') === 'update')
                        Подаци о кандидату су успешно сачувани.
                    @elseif(Session::get('flash-success') === 'delete')
                        Подаци о кандидату су успешно обрисани.
                    @endif
                </div>
            @endif
        </div>
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
