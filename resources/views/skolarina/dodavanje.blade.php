@extends('layouts.layout')
@section('page_heading','Унос школарине')
@section('section')
    <div class="col-lg-9">
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
        <div class="panel panel-success">
            <div class="panel-heading">
                <h3 class="panel-title">Унос школарине</h3>
            </div>
            <div class="panel-body">
                <form role="form" method="post" action="{{$putanja}}/skolarina/store">
                    {{ csrf_field() }}

                    <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $kandidat->id }}">

                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="iznos">Износ</label>
                            <input id="iznos" class="form-control" type="text" name="iznos" value=""/>
                        </div>

                        <div class="form-group col-lg-8">
                            <label for="komentar">Коментар</label>
                            <input id="komentar" class="form-control" type="text" name="komentar" value=""/>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-6">
                            <label for="tipStudija_id">Тип студија</label>
                            <select class="form-control" id="tipStudija_id" name="tipStudija_id">
                                @foreach($tipStudija as $item)
                                    <option value="{{ $item->id }}" {{ ($kandidat->tipStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group col-lg-4">
                            <label for="godinaStudija_id">Година студија</label>
                            <select class="form-control" id="godinaStudija_id" name="godinaStudija_id">
                                @foreach($godinaStudija as $item)
                                    <option value="{{ $item->id }}" {{ ($kandidat->godinaStudija_id == $item->id ? "selected":"") }}>{{ $item->naziv }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="clearfix"></div>
                    <hr>

                    <div class="form-group text-center">
                        <button type="submit" class="btn btn-success btn-lg"><span class="fa fa-save"></span> Сачувај
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
