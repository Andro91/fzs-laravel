@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
@section('section')
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
        @endif
    </div>
    <hr>
    @if(!empty($studenti))
        @foreach($studenti as $index => $kandidat)
            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">{{ $kandidat->imeKandidata . " " . $kandidat->prezimeKandidata }}</h3>
                </div>
                <div class="panel-body">
                    <input type="hidden" id="zapisnik_id" name="zapisnik_id" value="{{ $zapisnik->id }}">
                    <input type="hidden" id="prijava_id" name="prijava_id" value="{{ $zapisnik->datum }}">
                    <input type="hidden" id="datum" name="datum" value="{{ $zapisnik->datum }}">
                    <input type="hidden" id="datum" name="datum" value="{{ $zapisnik->datum }}">
                    <input type="hidden" id="datum" name="datum" value="{{ $zapisnik->datum }}">
                    <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                        <label for="ocenaPismeni">Оцена писмени</label>
                        <input type="text" id="ocenaPismeni" name="ocenaPismeni" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                        <label for="ocenaUsmeni">Оцена усмени</label>
                        <input type="text" id="ocenaUsmeni" name="ocenaUsmeni" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                        <label for="brojBodova">Број бодова</label>
                        <input type="text" id="brojBodova" name="brojBodova" class="form-control">
                    </div>
                    <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                        <label for="konacnaOcena">Коначна оцена</label>
                        <select class="form-control" id="konacnaOcena" name="konacnaOcena">
                            <option value="5">5</option>
                            <option value="6">6</option>
                            <option value="7">7</option>
                            <option value="8">8</option>
                            <option value="9">9</option>
                            <option value="10">10</option>
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                        <label for="konacnaOcenaSlovima">Коначна оцена словима</label>
                        <select class="form-control" id="konacnaOcenaSlovima" name="konacnaOcenaSlovima" disabled>
                            <option value="5">пет</option>
                            <option value="6">шест</option>
                            <option value="7">седам</option>
                            <option value="8">осам</option>
                            <option value="9">девет</option>
                            <option value="10">десет</option>
                        </select>
                    </div>
                    <div class="form-group pull-left" style="width: 30%;">
                        <label for="statusIspita">Статус испита</label>
                        <select class="form-control" id="statusIspita" name="statusIspita">
                            @foreach($statusIspita as $item)
                                <option value="{{ $item->id }}">{{ $item->naziv }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
        @endforeach
    @endif
    <br>
    <br>
    <script>
        $('#konacnaOcena').change(function () {
            $('#konacnaOcenaSlovima').val($('#konacnaOcena').val());
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



