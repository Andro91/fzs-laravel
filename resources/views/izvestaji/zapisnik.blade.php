<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($studenti !== '')

    <div style="text-align: center;">

            <h1 style="padding-bottom: 100px;">Записник о полагању испита</h1>

        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; width: 20px;"></th>
                <th style="border: 1px solid black;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black;"><b>Име</b>
                </th>
                <th style="border: 1px solid black;"><b>Презиме</b>
                </th>
                <th style="border: 1px solid black;"><b>Број полагања</b>
                </th>
            </tr>
            </thead>
            @foreach($polozeniIspiti as $index => $ispit)
                <tr>
                    <td style="width: 20px;">{{$index + 1}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->kandidat->brojIndeksa}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->kandidat->imeKandidata}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->kandidat->prezimeKandidata}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->prijava->brojPolaganja}}</td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>Нема дипломираних студената у овом периоду.</h1>
@endif


<br/>
<br/>
<br/>
<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Овлашћено лице</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>






















