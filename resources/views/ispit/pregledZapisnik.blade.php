@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
@section('section')
    <div class="col-lg-10">
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
                        Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио школарину
                        и
                        покушајте поново.
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

        <form target="_blank" action="{{$putanja}}/izvestaji/zapisnikStampa/{{$zapisnik->id}}" method="post">
            {{ csrf_field() }}
            <div class="form-group pull-left" style="width: 48%;">
                <input type="hidden" name="id" value="{{$zapisnik->id}}">
                <input type="submit" class="btn btn-primary" value="Штампа записника">
            </div>
        </form>

        <hr>
        @if(!empty($polozeniIspiti))
            @foreach($polozeniIspiti as $index => $ispit)
                <form action="{{ $putanja }}/zapisnik/polozeniIspit" method="post">
                    {{ csrf_field() }}
                    <div class="panel panel-success">
                        <div class="panel-heading">
                            <h3 class="panel-title">{{ $ispit->kandidat->imeKandidata . " " . $ispit->kandidat->prezimeKandidata }}</h3>
                        </div>
                        <div class="panel-body">
                            <input type="hidden" id="ispit_id" name="ispit_id[{{ $index }}]" value="{{ $ispit->id }}">
                            <input type="hidden" id="zapisnik_id" name="zapisnik_id[{{ $index }}]"
                                   value="{{ $zapisnik->id }}">
                            <input type="hidden" id="prijava_id" name="prijava_id[{{ $index }}]"
                                   value="{{ $prijavaIds[$ispit->kandidat->id] }}">
                            <input type="hidden" id="kandidat_id" name="kandidat_id[{{ $index }}]"
                                   value="{{ $ispit->kandidat->id }}">
                            <input type="hidden" id="predmet_id" name="predmet_id" value="{{ $zapisnik->predmet_id }}">

                            <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                                <label for="ocenaPismeni">Оцена писмени</label>
                                <input type="text" id="ocenaPismeni" name="ocenaPismeni[{{ $index }}]"
                                       value="{{ $ispit->indikatorAktivan == 1 ? $ispit->ocenaPismeni : "" }}"
                                       class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                                <label for="ocenaUsmeni">Оцена усмени</label>
                                <input type="text" id="ocenaUsmeni" name="ocenaUsmeni[{{ $index }}]"
                                       value="{{ $ispit->indikatorAktivan == 1 ? $ispit->ocenaUsmeni : "" }}"
                                       class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                                <label for="brojBodova">Број бодова</label>
                                <input type="text" id="brojBodova" name="brojBodova[{{ $index }}]"
                                       value="{{ $ispit->indikatorAktivan == 1 ? $ispit->brojBodova : "" }}"
                                       class="form-control">
                            </div>
                            <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                                <label for="konacnaOcena">Коначна оцена</label>
                                <select class="form-control konacnaOcena" data-index="{{ $index }}"
                                        name="konacnaOcena[{{ $index }}]">
                                    <option value="5" {{ $ispit->konacnaOcena == 5 ? 'selected' : "" }}>5</option>
                                    <option value="6" {{ $ispit->konacnaOcena == 6 ? 'selected' : "" }}>6</option>
                                    <option value="7" {{ $ispit->konacnaOcena == 7 ? 'selected' : "" }}>7</option>
                                    <option value="8" {{ $ispit->konacnaOcena == 8 ? 'selected' : "" }}>8</option>
                                    <option value="9" {{ $ispit->konacnaOcena == 9 ? 'selected' : "" }}>9</option>
                                    <option value="10" {{ $ispit->konacnaOcena == 10 ? 'selected' : "" }}>10</option>
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 30%; margin-right: 2%">
                                <label for="konacnaOcenaSlovima">Коначна оцена словима</label>
                                <select class="form-control konacnaOcenaSlovima" data-index="{{ $index }}"
                                        name="konacnaOcenaSlovima" disabled>
                                    <option value="5" {{ $ispit->konacnaOcena == 5 ? 'selected' : "" }}>пет</option>
                                    <option value="6" {{ $ispit->konacnaOcena == 6 ? 'selected' : "" }}>шест</option>
                                    <option value="7" {{ $ispit->konacnaOcena == 7 ? 'selected' : "" }}>седам</option>
                                    <option value="8" {{ $ispit->konacnaOcena == 8 ? 'selected' : "" }}>осам</option>
                                    <option value="9" {{ $ispit->konacnaOcena == 9 ? 'selected' : "" }}>девет</option>
                                    <option value="10" {{ $ispit->konacnaOcena == 10 ? 'selected' : "" }}>десет</option>
                                </select>
                            </div>
                            <div class="form-group pull-left" style="width: 30%;">
                                <label for="statusIspita">Статус испита</label>
                                <select class="form-control" id="statusIspita" name="statusIspita[{{ $index }}]">
                                    @foreach($statusIspita as $item)
                                        <option value="{{ $item->id }}">{{ $item->naziv }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group text-center">
                                <button type="submit" name="Submit" class="btn btn-success btn-lg"><span
                                            class="fa fa-save"></span> Сачувај
                                </button>
                            </div>
                        </div>
                    </div>
                </form>
            @endforeach
        @endif
        <br>
        <br>
    </div>
    <script>
        $('.konacnaOcena').change(function () {
            var indeks = $(this).data('index');
            $('.konacnaOcenaSlovima[data-index=' + indeks + ']').val($('.konacnaOcena[data-index=' + indeks + ']').val());
        });
    </script>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



