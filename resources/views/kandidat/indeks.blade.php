@extends('layouts.layout')
@section('page_heading','Pregled kandidata')
@section('section')
    <script type="text/javascript" src="{{ URL::asset('/js/datatables.min.js') }}"></script>
    <link rel="stylesheet" type="text/css" href="{{ URL::asset('/css/datatables.min.css') }}"/>
    <!--<script type="text/javascript" src="{{ URL::asset('//cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css') }}"></script>-->
    <!--<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/u/dt/dt-1.10.12/datatables.min.css"/>-->

    <div class="col-sm-12 col-lg-10">
            <table id="tabela" class="table">
                <thead>
                    <th>Ime</th>
                    <th>Prezime</th>
                    <th>JMBG</th>
                    <th>Izmena</th>
                </thead>
                <tbody>
                @foreach($kandidati as $kandidat)
                    <tr>
                        <td>{{$kandidat->imeKandidata}}</td>
                        <td>{{$kandidat->prezimeKandidata}}</td>
                        <td>{{$kandidat->jmbg}}</td>
                        <td><a href="/kandidat/{{ $kandidat->id }}/edit">Izmeni</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
    </div>

    <script>
        $( document ).ready(function() {
            $('#tabela').dataTable({"aaSorting": [],
                "oLanguage": {
                    "sProcessing": "Procesiranje u toku...",
                    "sLengthMenu": "Prikaži _MENU_ elemenata",
                    "sZeroRecords": "Nije pronađen nijedan rezultat",
                    "sInfo": "Prikaz _START_ do _END_ od ukupno _TOTAL_ elemenata",
                    "sInfoEmpty": "Prikaz 0 do 0 od ukupno 0 elemenata",
                    "sInfoFiltered": "(filtrirano od ukupno _MAX_ elemenata)",
                    "sInfoPostFix": "",
                    "sSearch": "Pretraga:",
                    "sUrl": "",
                    "oPaginate": {
                        "sFirst": "Početna",
                        "sPrevious": "Prethodna",
                        "sNext": "Sledeća",
                        "sLast": "Poslednja"
                    }
                }
            });
        });
    </script>
@endsection
