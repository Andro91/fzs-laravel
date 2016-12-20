@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
@section('section')
    <div class="col-lg-10">
        <div id="messages">
            @if (Session::get('flash-error'))
                <div class="alert alert-dismissible alert-danger">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>Грешка!</strong>
                    @if(Session::get('flash-error') === 'create')
                        Дошло је до грешке при чувању података! Молимо вас покушајте поново.
                    @endif
                </div>
            @endif
        </div>
        <br>
        <a href="{{$putanja}}/zapisnik/create/" class="btn btn-primary"><span class="fa fa-plus"></span> Нов
            записник</a>
        <hr>
        <table id="tabela" class="table">
            <thead>
            <tr>
                <th>Предмет</th>
                <th>Испитни рок</th>
                <th>Датум</th>
                <th>Време</th>
                <th>Број студената</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($zapisnici as $index => $zapisnik)
                <tr>
                    <td>{{$zapisnik->predmet->naziv}}</td>
                    <td>{{$zapisnik->ispitniRok->naziv}}</td>
                    <td>{{$zapisnik->datum->format('d.m.Y.')}}</td>
                    <td>{{$zapisnik->vreme}}</td>
                    <td>{{$zapisnik->studenti->count()}}</td>
                    <td>
                        <a class="btn btn-primary" href="{{$putanja}}/zapisnik/pregled/{{ $zapisnik->id }}">Преглед
                            полагања</a>
                        <a class="btn btn-danger" href="{{$putanja}}/zapisnik/delete/{{ $zapisnik->id }}"
                           onclick="return confirm('Да ли сте сигурни да желите да обришете овај записник?');">Бриши</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



