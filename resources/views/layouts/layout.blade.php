@extends('layouts.header')
<script type="text/javascript" src="{{ URL::asset('/js/jquery-1.12.4.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/datatables.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/jquery.maskedinput.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/jquery-ui.min.js') }}"></script>
<script type="text/javascript" src="{{ URL::asset('/js/bootstrap.min.js') }}"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/bootstrap.min.css') }}"/>
<script type="text/javascript" src="{{ $putanja }}/js/my-utility-functions.js"></script>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/datatables.min.css') }}"/>
<link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/jquery-ui.min.css') }}"/>

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
                        {{--<li class="sidebar-search">--}}
                        {{--<div class="input-group custom-search-form">--}}
                        {{--<input type="text" class="form-control" placeholder="Search...">--}}
                        {{--<span class="input-group-btn">--}}
                        {{--<button class="btn btn-default" type="button">--}}
                        {{--<i class="fa fa-search"></i>--}}
                        {{--</button>--}}
                        {{--</span>--}}
                        {{--</div>--}}
                        {{--<!-- /input-group -->--}}
                        {{--</li>--}}
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-user"> </i>&nbsp;Кандидати<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*kandidat/create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('kandidat/create') }}">Додавање</a>
                                </li>
                                <li {{ (Request::is('*kandidat/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('kandidat/' ) }}">Преглед</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-education"> </i>&nbsp;Мастер кандидати<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*master/create') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('master/create') }}">Додавање</a>
                                </li>
                                <li {{ (Request::is('*master/') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('master/' ) }}">Преглед</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="glyphicon glyphicon-education"> </i>&nbsp;Активни студенти<span
                                        class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                <li {{ (Request::is('*student/index/1') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/index/1') }}">Основне студије</a>
                                </li>
                                <li {{ (Request::is('*student/index/2') ? 'class="active"' : '') }}>
                                    <a href="{{ url ('student/index/2' ) }}">Мастер студије</a>
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
                                    <a href="{{ url ('statusKandidata' ) }}">Статус кандидата</a>
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
                        <!-- /.nav-second-level -->
                        {{--</li>--}}
                        {{--<li {{ (Request::is('/') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('') }}"><i class="fa fa-dashboard fa-fw"></i> Dashboard</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*charts') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('charts') }}"><i class="fa fa-bar-chart-o fa-fw"></i> Charts</a>--}}
                        {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*tables') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('tables') }}"><i class="fa fa-table fa-fw"></i> Tables</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*forms') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('forms') }}"><i class="fa fa-edit fa-fw"></i> Forms</a>--}}
                        {{--</li>--}}
                        {{--<li >--}}
                        {{--<a href="#"><i class="fa fa-wrench fa-fw"></i> UI Elements<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                        {{--<li {{ (Request::is('*panels') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('panels') }}">Panels and Collapsibles</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*buttons') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('buttons' ) }}">Buttons</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*notifications') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url('notifications') }}">Alerts</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*typography') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('typography') }}">Typography</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*icons') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('icons') }}"> Icons</a>--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*grid') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('grid') }}">Grid</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-sitemap fa-fw"></i> Multi-Level Dropdown<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                        {{--<li>--}}
                        {{--<a href="#">Second Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">Second Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">Third Level <span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-third-level">--}}
                        {{--<li>--}}
                        {{--<a href="#">Third Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">Third Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">Third Level Item</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#">Third Level Item</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-third-level -->--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="#"><i class="fa fa-files-o fa-fw"></i> Sample Pages<span class="fa arrow"></span></a>--}}
                        {{--<ul class="nav nav-second-level">--}}
                        {{--<li {{ (Request::is('*blank') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('blank') }}">Blank Page</a>--}}
                        {{--</li>--}}
                        {{--<li>--}}
                        {{--<a href="{{ url ('login') }}">Login Page</a>--}}
                        {{--</li>--}}
                        {{--</ul>--}}
                        {{--<!-- /.nav-second-level -->--}}
                        {{--</li>--}}
                        {{--<li {{ (Request::is('*documentation') ? 'class="active"' : '') }}>--}}
                        {{--<a href="{{ url ('documentation') }}"><i class="fa fa-file-word-o fa-fw"></i> Documentation</a>--}}
                        {{--</li>--}}
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

