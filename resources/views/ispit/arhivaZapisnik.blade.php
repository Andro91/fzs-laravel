@extends('layouts.layout')
@section('page_heading','Архива записника о полагању испита')
@section('section')
    <div class="col-lg-12">
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

        <div class="row">
            <div class="col-lg-8">
                <a href="{{$putanja}}/zapisnik/" class="btn btn-default"><i class="fa fa-backward"></i> Назад на
                    преглед</a>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="col-lg-8">
                <div class="row">
                    <form role="form" method="post" action="{{$putanja}}/zapisnik/arhivirajRok">
                        {{ csrf_field() }}
                        <div class="form-group col-lg-4">
                            <label for="rok_id">Архивирај записнике за испитни рок</label>
                            <select class="form-control" id="rok_id"
                                    name="rok_id">
                                @if(!empty($aktivniIspitniRok))
                                    @foreach($aktivniIspitniRok as $tip)
                                        <option value="{{$tip->id}}" {{ (!empty($rok_id) && $rok_id == $tip->id) ? 'selected' : '' }}>{{$tip->naziv}}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                        <div class="form-group col-lg-1">
                            <label for="submit">&nbsp;</label>
                            <input type="submit" id="submit" class="btn btn-success" value="Архивирај">
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <hr>
        <table id="tabela" class="table">
            <thead>
            <tr>
                <th>Предмет</th>
                <th>Испитни рок</th>
                <th>Професор</th>
                <th>Датум</th>
                <th>Број студената</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @foreach($arhiviraniZapisnici as $index => $zapisnik)
                <tr>
                    <td>{{$zapisnik->predmet->naziv}}</td>
                    <td>{{$zapisnik->ispitniRok->naziv}}</td>
                    <td>{{$zapisnik->profesor->ime . " " . $zapisnik->profesor->prezime}}</td>
                    <td>{{$zapisnik->datum->format('d.m.Y.')}}</td>
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



