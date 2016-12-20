<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if(!$polozeniIspiti->isEmpty())

    <div style="text-align: center;">

            <h1 style="padding-bottom: 100px;">Записник о полагању испита</h1>

        <div style="text-align: left;">
            <h3>Предмет: {{ $predmet }}</h3>
            <h4>Испитни рок: {{ $rok }}</h4>
            <h4>Професор: {{ $profesor }}</h4>
        </div>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; width: 20px;"></th>
                <th style="border: 1px solid black;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black; width:120px;"><b>Име и презиме</b>
                </th>
                <th style="border: 1px solid black;"><b>Број полагања</b>
                </th>
                <th style="border: 1px solid black;"><b>Оцена усмени</b>
                </th>
                <th style="border: 1px solid black;"><b>Оцена писмени</b>
                </th>
                <th style="border: 1px solid black;"><b>Број бодова</b>
                </th>
                <th style="border: 1px solid black;"><b>Коначна оцена</b>
                </th>
            </tr>
            </thead>
            @foreach($polozeniIspiti as $index => $ispit)
                <tr>
                    <td style="border: 1px solid black; width: 20px;">{{$index + 1}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->kandidat->brojIndeksa}}</td>
                    <td style="border: 1px solid black; text-align: left; width:120px;">{{$ispit->kandidat->imeKandidata}} {{$ispit->kandidat->prezimeKandidata}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->prijava->brojPolaganja}}</td>
                    <td style="border: 1px solid black; text-align: left;"></td>
                    <td style="border: 1px solid black; text-align: left;"></td>
                    <td style="border: 1px solid black; text-align: left;"></td>
                    <td style="border: 1px solid black; text-align: left;"></td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>Нема дипломираних студената у овом периоду.</h1>
@endif










