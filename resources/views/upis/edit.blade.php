@extends('layouts.layout')
@section('page_heading',"Измена године")
@section('section')
    <div class="col-lg-10">
        <form action="{{$putanja}}/student/{{ $upisGodine->id }}/izmenaGodine" method="post">
            {{ csrf_field() }}
            <div class="row">
                <input type="hidden" name="id" id="id" value="{{ $upisGodine->id }}">
                <input type="hidden" name="kandidat_id" id="kandidat_id" value="{{ $upisGodine->kandidat_id }}">
                <input type="hidden" name="godina" id="godina" value="{{ $upisGodine->godina }}">
                <input type="hidden" name="pokusaj" id="pokusaj" value="{{ $upisGodine->pokusaj }}">

                <div class="form-group col-lg-6">
                    <label for="godina">Година</label>
                    <input class="form-control" type="text" name="godina" id="godina"
                           value="{{ $upisGodine->godina }}" disabled/>
                </div>
                <div class="form-group col-lg-6">
                    <label for="pokusaj">Покушај</label>
                    <input class="form-control" type="text" name="pokusaj" id="pokusaj"
                           value="{{ $upisGodine->pokusaj }}" disabled/>
                </div>
                <div class="form-group col-lg-7">
                    <label for="statusGodine_id">Статус године</label>
                    <select class="form-control" id="statusGodine_id" name="statusGodine_id">
                        @foreach($statusGodine as $item)
                            <option value="{{ $item->id }}" {{ ($upisGodine->statusGodine_id == $item->id ? "selected":"") }}>
                                {{ $item->naziv }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-7">
                    <label for="skolskaGodina_id">Школска година</label>
                    <select class="form-control" id="skolskaGodina_id" name="skolskaGodina_id">
                        @foreach($skolskaGodina as $item)
                            <option value="{{ $item->id }}" {{ ($upisGodine->skolskaGodina_id == $item->id ? "selected":"") }}>
                                {{ $item->naziv }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="datumUpisa_format">Датум уписа</label>
                    <input class="form-control dateMask" type="text" name="datumUpisa_format"
                           id="datumUpisa_format"
                           value="
                           @if(!empty($upisGodine->datumUpisa))
                                {{ $upisGodine->datumUpisa->format('d.m.Y.') }}
                           @endif"/>
                </div>
                <div class="form-group col-lg-6">
                    <label for="datumPromene_format">Датум промене</label>
                    <input class="form-control dateMask" type="text" name="datumPromene_format"
                           id="datumPromene_format"
                           value="
                           @if(!empty($upisGodine->datumPromene))
                                {{ $upisGodine->datumPromene->format('d.m.Y.') }}
                           @endif"/>
                </div>
                <input type="hidden" name="datumUpisa" id="datumUpisa" value="{{$upisGodine->datumUpisa}}">
                <input type="hidden" name="datumPromene" id="datumPromene" value="{{$upisGodine->datumPromene}}">
            </div>

            <input type="submit" class="btn btn-success" value="Измени">
        </form>
    </div>
    <script>
        var formatStatus = $("#datumUpisa_format");
        formatStatus.datepicker({
            dateFormat: 'dd.mm.yy.',
            altField: "#datumUpisa",
            altFormat: "yy-mm-dd"
        });

//        formatStatus.on('input', function () {
//            if (typeof formatStatus.val() === "undefined") {
//                var date = null;
//            }else{
//                var date = moment(formatStatus.val(), "dd.mm.yy");
//            }
//            $("#datumUpisa").val(date.format('YYYY-MM-DD'));
//        });

        var formatPromena = $("#datumPromene_format");
        formatPromena.datepicker({
            dateFormat: 'dd.mm.yy.',
            altField: "#datumPromene",
            altFormat: "yy-mm-dd"
        });

//        formatPromena.on('input', function () {
//            if (typeof formatPromena.val() === "undefined") {
//                var date = null;
//            }else {
//                var date = moment(formatPromena.val(), "dd.mm.yy");
//            }
//            $("#datumPromene").val(date.format('YYYY-MM-DD'));
//        });
    </script>
    <script type="text/javascript" src="{{ $putanja }}/js/dateMask.js"></script>
@endsection