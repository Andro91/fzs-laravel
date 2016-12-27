@extends('layouts.layout')
@section('page_heading','Испити')
@section('section')
    <div class="col-lg-12">
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
                <h3 class="panel-title">Пријава за полагање испита</h3>
            </div>
            <div class="panel-body">
                <a href="{{$putanja}}/prijava/student/{{$kandidat->id}}" class="btn btn-primary"><span
                            class="fa fa-plus"></span> Нова пријава</a>

                <a href="{{$putanja}}/priznavanjeIspita/{{$kandidat->id}}" class="btn btn-info"><span
                            class="fa fa-plus"></span> Признати испити</a>

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
                                Дошло је до грешке при упису кандидата! Молимо вас проверите да ли је кандидат уплатио
                                школарину и покушајте поново.
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
                <table id="tabela" class="table">
                    <thead>
                    <tr>
                        <th>Кандидат</th>
                        <th>Број Индекса</th>
                        <th>Предмет</th>
                        <th>Рок</th>
                        <th>Број Полагања</th>
                        <th>Датум</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($prijave as $index => $prijava)
                        <tr>
                            <td>{{$kandidat->imeKandidata . " " . $kandidat->prezimeKandidata}}</td>
                            <td>{{$kandidat->brojIndeksa}}</td>
                            <td>{{$prijava->predmet->predmet->naziv}}</td>
                            <td>{{$prijava->rok->naziv}}</td>
                            <td>{{$prijava->brojPolaganja}}</td>
                            <td>{{$prijava->datum->format('d.m.Y')}}</td>
                            <td>
                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                <a class="btn btn-danger"
                                   href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"
                                   onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        {{--<div class="panel panel-success">--}}
            {{--<div class="panel-heading">--}}
                {{--<h3 class="panel-title">Положени испити</h3>--}}
            {{--</div>--}}
            {{--<div class="panel-body">--}}
                {{--<div>--}}

                    {{--<!-- Nav tabs -->--}}
                    {{--<ul class="nav nav-tabs" role="tablist">--}}

                        {{--<li role="presentation" class="active"><a href="#prvaGodina" aria-controls="prvaGodina"--}}
                                                                  {{--role="tab"--}}
                                                                  {{--data-toggle="tab">Прва година</a></li>--}}

                        {{--<li role="presentation"><a href="#drugaGodina" aria-controls="drugaGodina" role="tab"--}}
                                                   {{--data-toggle="tab">Друга година</a></li>--}}

                        {{--<li role="presentation"><a href="#trecaGodina" aria-controls="trecaGodina" role="tab"--}}
                                                   {{--data-toggle="tab">Трећа година</a></li>--}}

                        {{--<li role="presentation"><a href="#cetvrtaGodina" aria-controls="cetvrtaGodina" role="tab"--}}
                                                   {{--data-toggle="tab">Четврта година</a></li>--}}

                        {{--@if(!empty($priznatiIspiti))--}}
                            {{--<li role="presentation"><a href="#priznati" aria-controls="priznati" role="tab"--}}
                                                       {{--data-toggle="tab">Признати испити</a></li>--}}
                        {{--@endif--}}

                        {{--<li role="presentation"><a href="#master" aria-controls="master" role="tab"--}}
                                                   {{--data-toggle="tab">Мастер студије</a></li>--}}
                    {{--</ul>--}}

                    {{--<!-- Tab panes -->--}}
                    {{--<div class="tab-content">--}}
                        {{--<div role="tabpanel" class="tab-pane active" id="prvaGodina">--}}
                            {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Предмет</th>--}}
                                    {{--<th>Рок</th>--}}
                                    {{--<th>Број Полагања</th>--}}
                                    {{--<th>Датум</th>--}}
                                    {{--<th>Оцена</th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(!empty($polozeniIspitiPrvaGodina))--}}
                                    {{--@foreach($polozeniIspitiPrvaGodina as $index => $ispit)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$ispit->predmet->predmet->naziv}}</td>--}}
                                            {{--<td>{{$ispit->prijava->rok->naziv}}</td>--}}
                                            {{--<td>{{$ispit->prijava->brojPolaganja}}</td>--}}
                                            {{--<td>{{$ispit->zapisnik->datum->format('d.m.Y.')}}</td>--}}
                                            {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                                {{--<a class="btn btn-danger"--}}
                                                {{--href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"--}}
                                                {{--onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div role="tabpanel" class="tab-pane" id="drugaGodina">--}}
                            {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Предмет</th>--}}
                                    {{--<th>Рок</th>--}}
                                    {{--<th>Број Полагања</th>--}}
                                    {{--<th>Датум</th>--}}
                                    {{--<th>Оцена</th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(!empty($polozeniIspitiDrugaGodina))--}}
                                    {{--@foreach($polozeniIspitiDrugaGodina as $index => $ispit)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$ispit->predmet->predmet->naziv}}</td>--}}
                                            {{--<td>{{$ispit->prijava->rok->naziv}}</td>--}}
                                            {{--<td>{{$ispit->prijava->brojPolaganja}}</td>--}}
                                            {{--<td>{{$ispit->zapisnik->datum->format('d.m.Y.')}}</td>--}}
                                            {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                                {{--<a class="btn btn-danger"--}}
                                                {{--href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"--}}
                                                {{--onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div role="tabpanel" class="tab-pane" id="trecaGodina">--}}
                            {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Предмет</th>--}}
                                    {{--<th>Рок</th>--}}
                                    {{--<th>Број Полагања</th>--}}
                                    {{--<th>Датум</th>--}}
                                    {{--<th>Оцена</th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(!empty($polozeniIspitiTrecaGodina))--}}
                                    {{--@foreach($polozeniIspitiPrvaGodina as $index => $ispit)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$ispit->naziv}}</td>--}}
                                            {{--<td>{{\App\PrijavaIspita::nazivRokaPoId($ispit->rok)}}</td>--}}
                                            {{--<td>{{$ispit->broj}}</td>--}}
                                            {{--<td>{{$ispit->datum}}</td>--}}
                                            {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                                {{--<a class="btn btn-danger"--}}
                                                {{--href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"--}}
                                                {{--onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--<div role="tabpanel" class="tab-pane" id="cetvrtaGodina">--}}
                            {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Предмет</th>--}}
                                    {{--<th>Рок</th>--}}
                                    {{--<th>Број Полагања</th>--}}
                                    {{--<th>Датум</th>--}}
                                    {{--<th>Оцена</th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(!empty($polozeniIspitiCetvrtaGodina))--}}
                                    {{--@foreach($polozeniIspitiPrvaGodina as $index => $ispit)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$ispit->naziv}}</td>--}}
                                            {{--<td>{{\App\PrijavaIspita::nazivRokaPoId($ispit->rok)}}</td>--}}
                                            {{--<td>{{$ispit->broj}}</td>--}}
                                            {{--<td>{{$ispit->datum}}</td>--}}
                                            {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                                {{--<a class="btn btn-danger"--}}
                                                {{--href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"--}}
                                                {{--onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                        {{--@if(!empty($priznatiIspiti))--}}
                            {{--<div role="tabpanel" class="tab-pane" id="priznati">--}}

                                {{--<div class="row">--}}
                                    {{--<div class="col-lg-8">--}}
                                        {{--<table class="table">--}}
                                            {{--<thead>--}}
                                            {{--<tr>--}}
                                                {{--<th>Предмет</th>--}}
                                                {{--<th>Оцена</th>--}}
                                                {{--<th></th>--}}
                                            {{--</tr>--}}
                                            {{--</thead>--}}
                                            {{--<tbody>--}}

                                            {{--@foreach($priznatiIspiti as $index => $ispit)--}}
                                                {{--<tr>--}}
                                                    {{--<td>{{$ispit->predmet->naziv}}</td>--}}
                                                    {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                                    {{--<td>--}}
                                                        {{--<a class="btn btn-danger"--}}
                                                           {{--href="{{$putanja}}/deletePriznatIspit/{{ $ispit->id }}"--}}
                                                           {{--onclick="return confirm('Да ли сте сигурни да желите да обришете податке?');">--}}
                                                            {{--<div title="Брисање">--}}
                                                                {{--<span class="fa fa-trash"></span>--}}
                                                            {{--</div>--}}
                                                        {{--</a>--}}
                                                    {{--</td>--}}
                                                {{--</tr>--}}
                                            {{--@endforeach--}}
                                            {{--</tbody>--}}
                                        {{--</table>--}}
                                    {{--</div>--}}
                                {{--</div>--}}
                            {{--</div>--}}
                        {{--@endif--}}
                        {{--<div role="tabpanel" class="tab-pane" id="master">--}}
                            {{--<table class="table">--}}
                                {{--<thead>--}}
                                {{--<tr>--}}
                                    {{--<th>Предмет</th>--}}
                                    {{--<th>Рок</th>--}}
                                    {{--<th>Број Полагања</th>--}}
                                    {{--<th>Датум</th>--}}
                                    {{--<th>Оцена</th>--}}
                                    {{--<th></th>--}}
                                {{--</tr>--}}
                                {{--</thead>--}}
                                {{--<tbody>--}}
                                {{--@if(!empty($polozeniIspitiMaster))--}}
                                    {{--@foreach($polozeniIspitiMaster as $index => $ispit)--}}
                                        {{--<tr>--}}
                                            {{--<td>{{$ispit->naziv}}</td>--}}
                                            {{--<td>{{\App\PrijavaIspita::nazivRokaPoId($ispit->rok)}}</td>--}}
                                            {{--<td>{{$ispit->broj}}</td>--}}
                                            {{--<td>{{$ispit->datum}}</td>--}}
                                            {{--<td>{{$ispit->konacnaOcena}}</td>--}}
                                            {{--<td>--}}
                                                {{--<a class="btn btn-primary" href="{{$putanja}}/master/{{ $kandidat->id }}/edit">Измени</a>--}}
                                                {{--<a class="btn btn-danger"--}}
                                                {{--href="{{$putanja}}/prijava/delete/{{ $prijava->id }}?prijava=student"--}}
                                                {{--onclick="return confirm('Да ли сте сигурни да желите да обришете ову пријаву?');">Бриши</a>--}}
                                            {{--</td>--}}
                                        {{--</tr>--}}
                                    {{--@endforeach--}}
                                {{--@endif--}}
                                {{--</tbody>--}}
                            {{--</table>--}}
                        {{--</div>--}}
                    {{--</div>--}}

                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
        <br>
        <br>
    </div>
    <script type="text/javascript" src="{{ URL::asset('/js/tabela.js') }}"></script>
@endsection



