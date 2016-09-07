<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($ispiti !== '')
    <div style="text-align: left"><label>Број: 66/2016</label> <br/>
        <label>Датум: {{$datum}}</label>
    </div>
    <p style="text-align: center;">

    <h1>УВЕРЕЊЕ</h1><br/><h4>О ПОЛОЖЕНИМ ИСПИТИМА</h4><br/>
    </p>
    <div style="text-align: justify;">{{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}})
        {{$student->prezimeKandidata}} рођен/а {{ date('d.m.Y.',strtotime($student->datumRodjenja)) }}
        године, место {{$student->mestoRodjenja}}, општина {{$student->mestoRodjenja}},
        Република Србија, број индекса {{$student->brojIndeksa}}, тип студија {{$student->program->tipStudija->naziv}},
        смер - {{$student->program->naziv}}, положио/ла је све испите предвиђене наставним планом и програмом:
    </div>

    <div>
        <br/>
        <br/>
        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black;"></th>
                <th style="border: 1px solid black;"><b>Назив</b>
                </th>
                <th style="border: 1px solid black;"><b>ЕСПБ</b>
                </th>
                <th style="border: 1px solid black;"><b>Оцена</b>
                </th>
            </tr>
            </thead>
            @foreach($ispiti as $index => $ispit)
                <tr>
                    <td style="border: 1px solid black;">{{$index + 1}}</td>
                    <td style="border: 1px solid black;">{{$ispit->predmet->naziv}}</td>
                    <td style="border: 1px solid black;">{{$ispit->predmet->espb}}</td>
                    <td style="border: 1px solid black;">{{$ispit->konacnaOcena}}</td>
                </tr>
            @endforeach
        </table>
        Закључно са редним бројем {{$index + 1}}.
    </div>
    <div>Просечна оцена у току студија {{$prosek}}.</div>
@else
    <h1>Нема положених испита.</h1>
@endif


<br/>
<br/>
<br/>
<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Одговорно лице</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>