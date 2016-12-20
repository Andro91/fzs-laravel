@extends('layouts.header')
{{--<script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.min.js') }}"></script>--}}
<script type="text/javascript" src="{{ URL::asset('/js/jquery-2.2.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/my-utility-functions.js') }}"></script>
{{--<script type="text/javascript" src="{{ URL::asset('/js/metisMenu.min.js') }}"></script>--}}
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/datatables.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/jquery-ui.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/jquery-ui.theme.min.css') }}"/>

{{--FullCalendar plugin--}}
<link rel='stylesheet' href="{{ URL::asset('/css/fullcalendar.min.css') }}" />
<script src="{{ URL::asset('/js/moment.min.js') }}"></script>
<script src="{{ URL::asset('/js/fullcalendar.min.js') }}"></script>
<script src="{{ URL::asset('/js/lang/sr-cyrl.js') }}"></script>

@section('body')

    <div id="wrapper">
        <!-- Navigation -->
        <nav class="navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <img class="pull-left" src="{{ $putanja }}/images/logo_fzs.png" height="30px"
                     style="margin: 10px 0px 10px 10px">
                <a class="navbar-brand" href="{{ url ('') }}"> Факултет за спорт</a>
            </div>
            <ul class="nav navbar-nav">
                <li><a href="{{$putanja}}/pretraga"><span class="fa fa-search"></span><b> Претрага</b></a></li>
            </ul>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right" style="margin-right: 5%">
                @if (Auth::guest())
                    <li><a href="/login">Пријава</a></li>
                    <li><a href="/register">Регистрација</a></li>
                @else
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Активни
                            корисник: {{ Auth::user()->name }} <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="{{$putanja}}/logout">Одјава</a></li>
                        </ul>
                    </li>
                @endif
            </ul>

            <div class="navbar-default sidebar" role="navigation">
                <div class="sidebar-nav navbar-collapse">
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="#"><span class="fa fa-user"></span>&nbsp;Кандидати<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*kandidat/create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('kandidat/create') }}">Додавање</a>
                                </li>
                                <li {{ (Request::is('*kandidat?studijskiProgramId=*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('kandidat?studijskiProgramId=1' ) }}">Преглед</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-book"></span>&nbsp;Мастер кандидати<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*master/create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('master/create') }}">Додавање</a>
                                </li>
                                <li {{ (Request::is('*master') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('master' ) }}">Преглед</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-graduation-cap"></span>&nbsp;Активни студенти<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*student/index/1*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/index/1?godina=1&studijskiProgramId=1') }}">Основне студије</a>
                                </li>
                                <li {{ (Request::is('*student/index/2*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/index/2?studijskiProgramId=4' ) }}">Мастер студије</a>
                                </li>
                                <li {{ (Request::is('*student/zamrznuti') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/zamrznuti' ) }}">Статус мировања</a>
                                </li>
                                <li {{ (Request::is('*student/diplomirani') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/diplomirani?tipStudijaId=1&studijskiProgramId=1' ) }}">Дипломирани студенти</a>
                                </li>
                                <li {{ (Request::is('*/izvestaji/spiskoviStudenti*') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/izvestaji/spiskoviStudenti' ) }}">Извештаји</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><span class="fa fa-calendar"></span>&nbsp;Испити<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*kalendar/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/kalendar/') }}">Календар</a>
                                </li>
                                <li {{ (Request::is('*predmeti/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/predmeti/') }}">Пријава испита</a>
                                </li>
                                <li {{ (Request::is('*zapisnik/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/zapisnik/') }}">Записник о полагању испита</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-book"></i>&nbsp;Админ шифарници<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*/tipStudija') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/tipStudija') }}">Тип студија</a>
                                </li>
                                <li {{ (Request::is('*/studijskiProgram') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/studijskiProgram' ) }}">Студијски програм</a>
                                </li>
                                <li {{ (Request::is('*/prilozenaDokumenta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/prilozenaDokumenta' ) }}">Приложена документа</a>
                                </li>
                                <li {{ (Request::is('*/godinaStudija') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('/godinaStudija' ) }}">Година студија</a>
                                </li>
                                <li {{ (Request::is('*statusStudiranja') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('statusStudiranja' ) }}">Статус студирања</a>
                                </li>
                                <!--<li {{ (Request::is('*srednjeSkoleFakulteti') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('srednjeSkoleFakulteti' ) }}">Средње школе и факултети</a>
                                </li>-->
                                <li {{ (Request::is('*semestar') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('semestar' ) }}">Семестар</a>
                                </li>
                                <li {{ (Request::is('*ispitniRok') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('ispitniRok' ) }}">Испитни рок</a>
                                </li>
                                <li {{ (Request::is('*oblikNastave') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('oblikNastave' ) }}">Облик наставе</a>
                                </li>
                                <li {{ (Request::is('*tipPredmeta') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('tipPredmeta' ) }}">Тип предмета</a>
                                </li>
                                <li {{ (Request::is('*bodovanje') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('bodovanje' ) }}">Бодовање</a>
                                </li>
                                <li {{ (Request::is('*statusKandidata') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('statusKandidata' ) }}">Статус године</a>
                                </li>
                                <li {{ (Request::is('*statusIspita') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('statusIspita' ) }}">Статус испита</a>
                                </li>
                                <li {{ (Request::is('*statusProfesora') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('statusProfesora' ) }}">Статус професора</a>
                                </li>
                                <li {{ (Request::is('*tipPrijave') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('tipPrijave' ) }}">Тип пријаве</a>
                                </li>
                                <!-- <li {{ (Request::is('*mesto') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('mesto' ) }}">Место</a>
                                </li>-->
                            </ul>
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-table fa-fw"></i>&nbsp;Шифарници<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*sport') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('sport' ) }}">Спортови</a>
                                </li>
                                <li {{ (Request::is('*predmet') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('predmet' ) }}">Предмет</a>
                                </li>
                                <li {{ (Request::is('*krsnaSlava') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('krsnaSlava' ) }}">Крсна слава</a>
                                </li>
                                <li {{ (Request::is('*region') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('region' ) }}">Регион</a>
                                </li>
                                <li {{ (Request::is('*opstina') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('opstina' ) }}">Општина</a>
                                </li>
                                <li {{ (Request::is('*profesor') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('profesor' ) }}">Професор</a>
                                </li>
                                <!-- <li {{ (Request::is('*mesto') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('mesto' ) }}">Место</a>
                                </li>-->
                            </ul>
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>

        <div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">@yield('page_heading')</h2>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <div class="row">
                @yield('section')
            </div>
            <!-- /#page-wrapper -->
        </div>
    </div>


@stop

