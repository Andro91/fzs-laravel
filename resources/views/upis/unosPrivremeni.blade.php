@extends('layouts.layout')
@section('page_heading','Додај испите')
@section('section')
    <div class="col-lg-10">
        <div class="row">
            <a class="btn btn-primary" href="/prijava/zaStudenta/{{ $kandidat->id }}">Назад на студента</a>
        </div>
        <br>
        <div>
            <h4>Подаци о студенту &nbsp;
                <a class="btn btn-warning"
                   href="{{$putanja}}/{{ $kandidat->tipStudija_id == 1 ? 'kandidat' : 'master' }}/{{ $kandidat->id }}/edit">
                    <div title="Измена">
                        <span class="fa fa-edit"></span>
                    </div>
                </a>
            </h4>
            <ul class="list-group">
                <li class="list-group-item">Број Индекса:
                    <strong>
                        {{ $kandidat->brojIndeksa }}
                    </strong>
                </li>
                <li class="list-group-item">Име (име родитеља) презиме:
                    <strong>
                        {{ $kandidat->imeKandidata . " (" . $kandidat->imePrezimeJednogRoditelja . ") " . $kandidat->prezimeKandidata }}
                    </strong>
                </li>
                <li class="list-group-item">ЈМБГ:
                    <strong>
                        {{ $kandidat->jmbg }}
                    </strong>
                </li>
                @if(!empty($kandidat->datumRodjenja))
                    <li class="list-group-item">Датум рођења:
                        <strong>
                            {{ $kandidat->datumRodjenja->format('d.m.Y') }}
                        </strong>
                    </li>
                @endif
            </ul>
        </div>
        <div class="row">
            <div class="form-group col-lg-4">
                <label for="addIspitList">Испити</label>
                <select class="form-control auto-combobox" id="addIspitList" name="addIspitList">
                    <option value=""></option>
                    @foreach($ispiti as $index => $ispit)
                        <option value="{{$ispit->id}}">{{$ispit->predmet->naziv}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-lg-1">
                <label for="addIspitButton">&nbsp;</label>
                <input type="button" value="Додај" name="button" id="addIspitButton"
                       class="btn btn-success">
            </div>
            <div class="col-lg-10">
                <form action="{{$putanja}}/prijava/dodajPolozeneIspite" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kandidat_id" value="{{$kandidat->id}}">
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Назив</th>
                            <th>Оцена</th>
                        </tr>
                        </thead>
                        <tbody id="addIspitTableBody">

                        </tbody>
                    </table>
                    <input type="submit" class="btn btn-success" value="Сачувај испите">
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-10">
                <table class="table">
                    <thead>
                    <tr>
                        <th>Назив</th>
                        <th>Оцена</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($polozeniIspiti as $ispit)
                        <tr>
                            <td>{{$ispit->predmet->predmet->naziv}}</td>
                            <td>{{$ispit->konacnaOcena}}</td>
                            <td>
                                <a class="btn btn-danger" href="{{$putanja}}/deletePrivremeniIspit/{{$ispit->id}}"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">
                                    <div title="Брисање"><i class="fa fa-trash"></i></div>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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

            $('#addIspitButton').click(function () {
                addIspitToList();
            });

            $(".custom-combobox-input").keypress(function (e) {
                var k = e.keyCode || e.which;
                if (k == 13) {
                    e.preventDefault();
                    console.log('input prevented');
                    addIspitToList();
                }
            });

            $(window).keydown(function (event) {
                if (event.keyCode == 13) {
                    event.preventDefault();
                    console.log('prevented');
                }
            });

            function addIspitToList() {
                $.ajax({
                    url: '{{$putanja}}/prijava/vratiIspitPoId',
                    type: 'post',
                    data: {
                        id: $('#addIspitList').val(),
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
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection