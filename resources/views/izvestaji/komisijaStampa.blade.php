<div style="height: 70px;"><img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($student && $diplomski && $podaci)
    <div style="text-align: left">

    </div>
    <div>
        <p style="text-align: justify;">На основу Правилника о изради и одбрани дипломског рада, својих овлашћења и писмене пријаве за одрбрану дипломског рада кандидата коју је
            поднео {{$student->imeKandidata}} {{$student->prezimeKandidata}}, декан Факултета за спорт доноси следећу:
            </p>

        <p style="text-align: center;">

        <h1>ОДЛУКУ</h1><br/>

        <h4>о именовању Комисије за одбрану дипломског рада</h4><br/>

        <p style="text-align: justify;">Именују се чланови Комисије за одбрану дипломског рада који брани кандидат {{$student->imeKandidata}} {{$student->prezimeKandidata}}
            на студијском програму {{$student->program->naziv}}, у следећем саставу:</p>

        <p>
            <ul>
            <li>{{$diplomski->predsednik->zvanje}} {{$diplomski->predsednik->ime}} {{$diplomski->predsednik->prezime}}, председник комисије</li>
            <li>{{$diplomski->profesor->zvanje}} {{$diplomski->profesor->ime}} {{$diplomski->profesor->prezime}}, ментор</li>
            <li>{{$diplomski->clan->zvanje}} {{$diplomski->clan->ime}} {{$diplomski->clan->prezime}}, члан</li>
        </ul>
        </p>

    </div>
<br/>

<div>
    <table>
        <tr>
            <td><label>Датум: {{ date('d.m.Y.',strtotime($podaci->datumOdbrane)) }}</label></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        <tr>
            <td></td>
            <td></td>

        </tr>
    </table>
</div>
@else
    <h1>Нема података о комисији.</h1>
@endif





















