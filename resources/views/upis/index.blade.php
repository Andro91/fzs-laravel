@extends('layouts.layout')
@section('page_heading',"???? ????????? ?? ???????")
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
                    Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио школарину и покушајте поново.
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
            @elseif(Session::get('flash-success') === 'upis')
                Упис кандидата је успешно извршен.
            @endif
    </div>
    <table class="table">
        <thead>
        <th>Име</th>
        <th>Презиме</th>
        <th>ЈМБГ</th>
        <th>Школарина</th>
        <th>Измена</th>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td>{{ $kandidat->uplata ? 'Уплатио' : 'Није уплатио'}}</td>
                <td>{{ $item->godina }}</td>
                <td>
                    <a class="btn btn-primary pull-left" href="{{$putanja}}/kandidat/{{ $kandidat->id }}/edit">??????</a>
                    <form class="pull-left" style="margin: 0 5px;" action="{{$putanja}}/kandidat/{{ $kandidat->id }}"
                          method="post" onsubmit="return confirm('');">
                        <input type="hidden" name="_method" value="DELETE">
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger" value="submit">
                    </form>
                </td>
            </tr>
        </tbody>
    </table>
    <br/>



    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection
