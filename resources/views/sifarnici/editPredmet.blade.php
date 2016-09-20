<title>Измени предмет</title>
@extends('layouts.layout')
@section('page_heading','Измени предмет')
@section('section')

    <div class="col-md-9">

        <form role="form" method="post" action="{{$putanja}}/predmet/{{$predmet->id}}">
            {{csrf_field()}}
            {{method_field('PATCH')}}


            <div class="panel panel-success">
                <div class="panel-heading">
                    <h3 class="panel-title">Измени предмет</h3>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <label for="naziv">Назив:</label>
                        <input name="naziv" type="text" class="form-control" value="{{$predmet->naziv}}">
                    </div>
                </div>
                <div class="panel-body">
                    <div class="form-group pull-left" style="width: 48%; margin-right: 2%;">
                        <button type="submit" class="btn btn-primary">Измени</button>
                    </div>
                </div>
            </div>
        </form>


    </div>

    <script>
        $(document).ready(function () {
            $("#tabs").tabs();

            $("#tipStudija_id").val($("#tipStudijaHidden").val());
            $("#studijskiProgram_id").val($("#studijskiProgramHidden").val());
            $("#godinaStudija_id").val($("#godinaStudijaHidden").val());
            $("#tipPredmeta_id").val($("#tipPredmetaHidden").val());
        });

        $('#tabela').dataTable({
            "aaSorting": [],
            "oLanguage": {
                "sProcessing": "Процесирање у току...",
                "sLengthMenu": "Прикажи _MENU_ елемената",
                "sZeroRecords": "Није пронађен ниједан резултат",
                "sInfo": "Приказ _START_ до _END_ од укупно _TOTAL_ елемената",
                "sInfoEmpty": "Приказ 0 до 0 од укупно 0 елемената",
                "sInfoFiltered": "(филтрирано од укупно _MAX_ елемената)",
                "sInfoPostFix": "",
                "sSearch": "Претрага:",
                "sUrl": "",
                "oPaginate": {
                    "sFirst": "Почетна",
                    "sPrevious": "Претходна",
                    "sNext": "Следећа",
                    "sLast": "Последња"
                }
            }
        });

    </script>

@endsection