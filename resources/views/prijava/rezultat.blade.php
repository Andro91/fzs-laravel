@extends('layouts.layout')
@section('page_heading','Резултат пријаве испита')
@section('section')
    <div class="col-lg-9">
        @if (count($errorArray) > 0)
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title">Студенти код којих је дошло до грешке</h3>
                </div>
                <div class="panel-body">
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th>Број индекса</th>
                            <th>Име</th>
                            <th>Презиме</th>
                            <th>ЈМБГ</th>
                            <th>Година студија</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($errorArray as $index => $kandidat)
                            <tr>
                                <td>{{$kandidat->brojIndeksa}}</td>
                                <td>{{$kandidat->imeKandidata}}</td>
                                <td>{{$kandidat->prezimeKandidata}}</td>
                                <td>{{$kandidat->jmbg}}</td>
                                <td>{{$kandidat->godinaStudija->nazivRimski}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
        @if (count($duplicateArray) > 0)
            <div class="panel panel-warning">
                <div class="panel-heading">
                    <h3 class="panel-title">Студенти који су већ пријављени у датом року</h3>
                </div>
                <div class="panel-body">
                    <table id="tabela" class="table">
                        <thead>
                        <tr>
                            <th>Број индекса</th>
                            <th>Име</th>
                            <th>Презиме</th>
                            <th>ЈМБГ</th>
                            <th>Година студија</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($duplicateArray as $index => $kandidat)
                            <tr>
                                <td>{{$kandidat->brojIndeksa}}</td>
                                <td>{{$kandidat->imeKandidata}}</td>
                                <td>{{$kandidat->prezimeKandidata}}</td>
                                <td>{{$kandidat->jmbg}}</td>
                                <td>{{$kandidat->godinaStudija->nazivRimski}}</td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
            <div class="alert alert-success">
                <strong>Студенти су успешно пријављени.</strong>
            </div>
        <a href="{{ $putanja }}/prijava/zaPredmet/{{ $predmetId }}">&lt;&lt; Назад на предмет</a>
    </div>
@endsection
