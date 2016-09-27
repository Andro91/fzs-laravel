@extends('layouts.layout')
@section('page_heading','Претрага кандидата')
@section('section')
    <div class="col-lg-10">
        {{--GRESKE--}}
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">Претрага кандидата</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{ url('/pretraga') }}">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <label for="search">Претрага</label>
                        <input type="text" class="form-control" id="pretraga" name="pretraga">
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Претрага">
                    </div>
                </form>
            </div>
        </div>
        @if(!empty($query))
            <div class="panel panel-primary">
                <div class="panel-heading">
                    <h3 class="panel-title">Резултати претраге</h3>
                </div>
                <div class="panel-body">
                    <table id="tabela" class="table">
                        <thead>
                        <th>Име</th>
                        <th>Презиме</th>
                        <th>ЈМБГ</th>
                        <th>Измена</th>
                        </thead>
                        <tbody>
                        @foreach($query as $index => $kandidat)
                            <tr>
                                </td>
                                <td>{{$kandidat->imeKandidata}}</td>
                                <td>{{$kandidat->prezimeKandidata}}</td>
                                <td>{{$kandidat->jmbg}}</td>
                                <td>
                                    <a class="btn btn-warning" href="{{$putanja}}/kandidat/{{ $kandidat->id }}/edit">
                                        <div title="Измена">
                                            <span class="fa fa-edit"></span>
                                        </div>
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @endif
    </div>
@endsection
