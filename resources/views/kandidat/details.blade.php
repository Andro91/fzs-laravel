@extends('layouts.layout')
@section('page_heading','Pregled kandidata')
@section('section')
    <div class="col-sm-12">
        <div class="row">
            <div class="col-lg-8">
                <dl class="dl-horizontal">
                    @foreach( $kandidat as $key => $value )

                        <dt>{{ $key }}</dt><dd>{{ $value }}</dd>

                    @endforeach
                </dl>
            </div>
        </div>
    </div>
@endsection