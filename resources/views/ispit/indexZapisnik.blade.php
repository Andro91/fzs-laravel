@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
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
            <div class="col-lg-6">
                <a href="{{$putanja}}/zapisnik/create/" class="btn btn-primary"><span class="fa fa-plus"></span> Нов
                    записник</a>
                <a href="{{$putanja}}/zapisnik/arhiva/" class="btn btn-warning"><i class="fa fa-archive"></i> Архива</a>
            </div>
        </div>
        <hr>
        <h4>Филтрирање записника</h4>
        <form role="form" method="get" action="{{$putanja}}/zapisnik">
            {{ csrf_field() }}
            <div class="row">

                <div class="form-group col-lg-3">
                    <label for="filter_predmet_id">Предмет</label>
                    <select class="form-control auto-combobox" id="filter_predmet_id"
                            name="filter_predmet_id">
                        <option value=""></option>
                    @foreach($predmeti as $item)
                            <option value="{{$item->id}}" {{ (!empty(app('request')->input('filter_predmet_id')) && app('request')->input('filter_predmet_id') == $item->id) ? 'selected' : '' }}>{{ $item->naziv }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-3">
                    <label for="filter_rok_id">Испитни рок</label>
                    <select class="form-control" id="filter_rok_id"
                            name="filter_rok_id">
                        <option value=""></option>
                        @if(!empty($aktivniIspitniRok))
                            @foreach($aktivniIspitniRok as $tip)
                                <option value="{{$tip->id}}" {{ (!empty(app('request')->input('filter_rok_id')) && app('request')->input('filter_rok_id') == $tip->id) ? 'selected' : '' }}>{{$tip->naziv}}</option>
                            @endforeach
                        @endif
                    </select>
                </div>

                <div class="form-group col-lg-3">
                    <label for="filter_profesor_id">Професор</label>
                    <select class="form-control auto-combobox" id="filter_profesor_id"
                            name="filter_profesor_id">
                        <option value=""></option>
                        @foreach($profesori as $item)
                            <option value="{{$item->id}}" {{ (!empty(app('request')->input('filter_profesor_id')) && app('request')->input('filter_profesor_id') == $item->id) ? 'selected' : '' }}>{{ $item->ime . " " . $item->prezime }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group col-lg-1">
                    <label for="submit">&nbsp;</label>
                    <input type="submit" id="submit" class="btn btn-primary" value="Филтрирај">
                </div>
                <div class="form-group col-lg-1">
                    <label for="a">&nbsp;</label>
                    <a href="{{$putanja}}/zapisnik/" class="btn btn-danger"><i class="fa fa-close"></i> Поништи филтар</a>
                </div>
            </div>
        </form>
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
            @foreach($zapisnici as $index => $zapisnik)
                <tr>
                    <td>{{$zapisnik->predmet->naziv}}</td>
                    <td>{{$zapisnik->ispitniRok->naziv}}</td>
                    <td>{{$zapisnik->profesor->ime . " " . $zapisnik->profesor->prezime}}</td>
                    <td>{{$zapisnik->datum->format('d.m.Y.')}}</td>
                    <td>{{$zapisnik->studenti->count()}}</td>
                    <td>
                        <div style="display:inline;">
                        <div class="col-lg-12" style="margin-top: 20px">
                            </div>
                            <div>
                            <form target="_blank" action="{{$putanja}}/izvestaji/zapisnikStampa/{{$zapisnik->id}}" method="post">
                                {{ csrf_field() }}
                                <div style="display:none;">
                                    <input type="hidden" name="predmet" value="{{$zapisnik->predmet->naziv}}">
                                    <input type="hidden" name="rok" value="{{$zapisnik->ispitniRok->naziv}}">
                                    <input type="hidden" name="profesor"
                                           value="{{$zapisnik->profesor->ime . " " . $zapisnik->profesor->prezime}}">
                                    <input type="hidden" name="id" value="{{$zapisnik->id}}">
                                </div>
                                <a class="btn btn-primary" href="{{$putanja}}/zapisnik/pregled/{{ $zapisnik->id }}">Преглед
                                    полагања</a>
                                <a class="btn btn-danger" href="{{$putanja}}/zapisnik/delete/{{ $zapisnik->id }}"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете овај записник?');">
                                    <div title="Брисање" style="padding: 2pt;">
                                        <i class="fa fa-trash"></i>
                                    </div>
                                </a>
                                <a class="btn btn-warning"
                                   href="{{$putanja}}/zapisnik/arhiviraj/{{ $zapisnik->id }}">
                                    <div title="архива">
                                        <i class="fa fa-archive"></i> У архиву
                                    </div>
                                </a>
                                <button type="submit" class="btn btn-primary fa fa-print"></button>
                            </form>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <br>
        <br>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection



