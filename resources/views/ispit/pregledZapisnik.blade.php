@extends('layouts.layout')
@section('page_heading','Записник о полагању испита')
@section('section')
    <style>
        .ui-autocomplete {
            z-index: 2147483647 !important;
        }
    </style>
    <div class="col-lg-10">
        {{--Modal za dodavanje studenata POCETAK--}}
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document" style="width: 60%">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                                    aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Додавање студената</h4>
                    </div>
                    <div class="modal-body">
                        <form action="{{$putanja}}/zapisnik/pregled/dodajStudenta" method="post">
                            {{ csrf_field() }}
                            <input type="hidden" name="zapisnikId" value="{{$zapisnik->id}}">

                            <div class="form-group col-lg-4">
                                <label for="addStudentList">Студенти</label>
                                <select class="form-control auto-combobox" id="addStudentList" name="addStudentList">
                                    <option value="0"></option>
                                    @foreach($kandidati as $index => $kandidat)
                                        <option value="{{$kandidat->id}}">{{$kandidat->brojIndeksa}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-1">
                                <label for="addStudentButton">&nbsp;</label>
                                <input type="button" value="Додај" name="button" id="addStudentButton"
                                       class="btn btn-success">
                            </div>
                            <table id="tabela" class="table">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th>Број индекса</th>
                                    <th>Име и презиме</th>
                                    <th>Година студија</th>
                                </tr>
                                </thead>
                                <tbody id="addStudentTableBody">

                                </tbody>
                            </table>
                            <button type="button" class="btn btn-default" data-dismiss="modal">Затвори</button>
                            <input type="submit" class="btn btn-success" value="Додај">
                        </form>
                    </div>
                    <div class="modal-footer">
                    </div>
                </div>
            </div>
        </div>
        {{--Modal za dodavanje studenata KRAJ--}}
        <div id="messages">
            @if (Session::get('errors'))
                <div class="alert alert-dismissable alert-danger">
                    <h4>Грешка!</h4>
                    <ul>
                        @foreach (Session::get('errors')->all() as $error)
                            <li>{!! $error !!}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
        <div class="row">
            <div class="col-lg-6">
                <h3>Предмет: {{ $zapisnik->predmet->naziv }}</h3>
                <h4>Испитни рок: {{ $zapisnik->ispitniRok->naziv }}</h4>
                <h4>Професор: {{ $zapisnik->profesor->ime . " " . $zapisnik->profesor->prezime }}</h4>
            </div>
            <div class="col-lg-4" style="margin-top: 20px">
                <h4>Време полагања: {{ $zapisnik->vreme }}</h4>
                <h4>Учионица: {{ $zapisnik->ucionica }}</h4>
            </div>
            <div class="col-lg-2" style="margin-top: 20px">
                <form target="_blank" action="{{$putanja}}/izvestaji/zapisnikStampa/{{$zapisnik->id}}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <input type="hidden" name="predmet" value="{{$zapisnik->predmet->naziv}}">
                        <input type="hidden" name="rok" value="{{$zapisnik->ispitniRok->naziv}}">
                        <input type="hidden" name="profesor"
                               value="{{$zapisnik->profesor->ime . " " . $zapisnik->profesor->prezime}}">
                        <input type="hidden" name="id" value="{{$zapisnik->id}}">
                        <input type="submit" class="btn btn-primary" value="Штампа записника">
                    </div>
                </form>
            </div>
        </div>
        <hr>
        @if(!empty($polozeniIspiti))
            <form action="{{ $putanja }}/zapisnik/polozeniIspit" method="post">
                {{ csrf_field() }}
                <table class="table">
                    <thead>
                    <tr>
                        <th>Ред бр.</th>
                        <th>Број индекса</th>
                        <th>Име и презиме</th>
                        <th>Поени</th>
                        <th>Оцена број</th>
                        <th>Оцена словима</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($polozeniIspiti as $index => $ispit)
                        <tr>
                            <td>{{$index + 1}}
                                <input type="hidden" id="ispit_id" name="ispit_id[{{ $index }}]"
                                       value="{{ $ispit->id }}">
                                <input type="hidden" id="zapisnik_id" name="zapisnik_id[{{ $index }}]"
                                       value="{{ $zapisnik->id }}">
                                <input type="hidden" id="prijava_id" name="prijava_id[{{ $index }}]"
                                       value="{{ $prijavaIds[$ispit->kandidat->id] }}">
                                <input type="hidden" id="kandidat_id" name="kandidat_id[{{ $index }}]"
                                       value="{{ $ispit->kandidat->id }}">
                                <input type="hidden" id="predmet_id" name="predmet_id"
                                       value="{{ $zapisnik->predmet_id }}">
                            </td>
                            <td>{{$ispit->kandidat->brojIndeksa}}</td>
                            <td>{{$ispit->kandidat->imeKandidata . " " . $ispit->kandidat->prezimeKandidata}}</td>
                            <td>
                                <input type="text" class="form-control brojBodova"
                                       id="brojBodova"
                                       name="brojBodova[{{ $index }}]"
                                       data-index="{{ $index }}"
                                       value="{{ $ispit->indikatorAktivan == 1 ? $ispit->brojBodova : "" }}">
                            </td>
                            <td>
                                <select class="form-control konacnaOcena" data-index="{{ $index }}"
                                        name="konacnaOcena[{{ $index }}]">
                                    <option value="0"></option>
                                    <option value="5" {{ $ispit->konacnaOcena == 5 ? 'selected' : "" }}>5</option>
                                    <option value="6" {{ $ispit->konacnaOcena == 6 ? 'selected' : "" }}>6</option>
                                    <option value="7" {{ $ispit->konacnaOcena == 7 ? 'selected' : "" }}>7</option>
                                    <option value="8" {{ $ispit->konacnaOcena == 8 ? 'selected' : "" }}>8</option>
                                    <option value="9" {{ $ispit->konacnaOcena == 9 ? 'selected' : "" }}>9</option>
                                    <option value="10" {{ $ispit->konacnaOcena == 10 ? 'selected' : "" }}>10
                                    </option>
                                </select>
                            </td>
                            <td>
                                <select class="form-control konacnaOcenaSlovima" data-index="{{ $index }}"
                                        name="konacnaOcenaSlovima" disabled>
                                    <option value="0"></option>
                                    <option value="5" {{ $ispit->konacnaOcena == 5 ? 'selected' : "" }}>пет</option>
                                    <option value="6" {{ $ispit->konacnaOcena == 6 ? 'selected' : "" }}>шест
                                    </option>
                                    <option value="7" {{ $ispit->konacnaOcena == 7 ? 'selected' : "" }}>седам
                                    </option>
                                    <option value="8" {{ $ispit->konacnaOcena == 8 ? 'selected' : "" }}>осам
                                    </option>
                                    <option value="9" {{ $ispit->konacnaOcena == 9 ? 'selected' : "" }}>девет
                                    </option>
                                    <option value="10" {{ $ispit->konacnaOcena == 10 ? 'selected' : "" }}>десет
                                    </option>
                                </select>
                            </td>
                            <td>
                                <a class="btn btn-danger" style="padding: 9px 12px"
                                   href="{{$putanja}}/zapisnik/pregled/{{ $zapisnik->id }}/{{ $ispit->kandidat->id }}/delete"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете овог студента?');">
                                    <div title="Брисање">
                                        <span class="fa fa-trash"></span>
                                    </div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <div class="form-group text-center">
                    <button type="button" name="add" class="btn btn-primary btn-lg" data-toggle="modal"
                            data-target="#myModal"><span
                                class="fa fa-plus"></span> Додај студента
                    </button>
                    <button type="submit" name="Submit" class="btn btn-success btn-lg"><span
                                class="fa fa-save"></span> Сачувај
                    </button>
                </div>
            </form>
        @endif
        <br>
        <br>
    </div>
    <script>
        $(document).ready(function () {
            $('.brojBodova').on('input', function (e) {
                var indeks = $(this).data('index');
                var brojBodova = $(this).val();
                var ocena = 0;
                switch (true) {
                    case (brojBodova == 0):
                        ocena = 0;
                        break;
                    case (brojBodova <= 50):
                        ocena = 5;
                        break;
                    case (brojBodova >= 51 && brojBodova <= 60):
                        ocena = 6;
                        break;
                    case (brojBodova >= 61 && brojBodova <= 70):
                        ocena = 7;
                        break;
                    case (brojBodova >= 71 && brojBodova <= 80):
                        ocena = 8;
                        break;
                    case (brojBodova >= 81 && brojBodova <= 90):
                        ocena = 9;
                        break;
                    case (brojBodova >= 91 && brojBodova <= 100):
                        ocena = 10;
                        break;
                    default:
                        ocena = 0;
                        break;
                }
                $('.konacnaOcena[data-index=' + indeks + ']').val(ocena);
                $('.konacnaOcenaSlovima[data-index=' + indeks + ']').val(ocena);
            });

            $('.konacnaOcena').change(function () {
                var indeks = $(this).data('index');
                $('.konacnaOcenaSlovima[data-index=' + indeks + ']').val($('.konacnaOcena[data-index=' + indeks + ']').val());
            });

            $('#addStudentButton').click(function () {
                addStudentToList();
            });

            $(".custom-combobox-input").keypress(function (e) {
                var k = e.keyCode || e.which;
                if (k == 13) {
                    e.preventDefault();
                    console.log('input prevented');
                    addStudentToList();
                }
            });

            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    console.log('prevented');
                }
            });

            function addStudentToList() {
                $.ajax({
                    url: '{{$putanja}}/prijava/vratiKandidataPoBroju',
                    type: 'post',
                    data: {
                        id: $('#addStudentList').val(),
                        _token: $('input[name=_token]').val()
                    },
                    success: function (result) {
                        $("#tabela tr:last").after(result);
                        $(".custom-combobox-input").val("");
                    },
                    error: function (jqXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                });
            }
        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/jquery-ui-autocomplete.js"></script>
@endsection



