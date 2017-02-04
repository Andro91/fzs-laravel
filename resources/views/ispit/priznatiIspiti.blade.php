@extends('layouts.layout')
@section('page_heading','Признати испити')
@section('section')
    <div class="col-lg-10">
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
        <div>
            <h4>Подаци о студенту</h4>
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Признати испити за студента</h3>
            </div>
            <div class="panel-body">
                <form id="formaPredmetOdabir" action="{{ $putanja }}/storePriznatiIspiti" method="post">
                    {{ csrf_field() }}
                    <input type="hidden" name="kandidat_id" value="{{$kandidat->id}}">
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th></th>
                            <th>Предмет</th>
                            <th>Семестар</th>
                            <th>ЕСПБ</th>
                            <th>Тип предмета</th>
                            <th>Коначна оцена</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($predmetProgram as $index => $predmet)
                            <tr>
                                <td>
                                    <input type="checkbox" id="predmetId" name="predmetId[{{ $index }}]"
                                           value="{{ $predmet->id }}">
                                </td>
                                <td>{{$predmet->predmet->naziv}}</td>
                                <td>{{$predmet->semestar}}</td>
                                <td>{{$predmet->espb}}</td>
                                <td>{{$predmet->tipPredmeta->naziv}}</td>
                                <td>
                                    <select class="form-control konacnaOcena" data-index="{{ $index }}"
                                            name="konacnaOcena[{{ $index }}]">
                                        <option value=""></option>
                                        <option value="6">6</option>
                                        <option value="7">7</option>
                                        <option value="8">8</option>
                                        <option value="9">9</option>
                                        <option value="10">10</option>
                                    </select>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                    <div class="form-group text-center">
                        <div id="sacuvaj" class="btn btn-primary btn-lg">Сачувај</div>
                    </div>
                </form>
            </div>
        </div>
        <br>
        <br>
    </div>
    <script>
        var forma = $('#formaPredmetOdabir');

        $('#sacuvaj').click(function () {
            forma.submit();
        });
    </script>
@endsection



