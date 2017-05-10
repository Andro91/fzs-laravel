<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($ispiti != null)
    <div style="text-align: left"><label>Број: 66/2016</label> <br/>
        <label>Датум: {{$datum}}</label>
    </div>
    <div style="text-align: center;">

    <h1>УВЕРЕЊЕ</h1><br/><h4>О ПОЛОЖЕНИМ ИСПИТИМА</h4><br/>
    </div>
    <div style="text-align: justify;">{{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}})
        {{$student->prezimeKandidata}} рођен/а {{ date('d.m.Y.',strtotime($student->datumRodjenja)) }}
        године, место {{$student->mestoRodjenja}}, општина {{$student->mestoRodjenja}},
        Република Србија, број индекса {{$student->brojIndeksa}}, тип студија {{$student->program->tipStudija->naziv}},
        смер - {{$student->program->naziv}}, положио/ла је све испите предвиђене наставним планом и програмом:
    </div>

    <div>
        <br/>
        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; background-color: grey; width:35px;"><b>Рбр</b></th>
                <th style="border: 1px solid black; background-color: grey; width:300px;"><b>Назив</b>
                </th>
                <th style="border: 1px solid black; background-color: grey; width:50px;"><b>ЕСПБ</b>
                </th>
                <th style="border: 1px solid black; background-color: grey; width:50px;"><b>Оцена</b>
                </th>
                <th style="border: 1px solid black; background-color: grey; width:100px;"><b>Оцена словима</b>
                </th>
            </tr>
            </thead>
            @foreach($ispiti as $index => $ispit)
                <tr>
                    <td style="border: 1px solid black; width:35px;">{{$index + 1}}</td>
                    <td style="border: 1px solid black; width:300px;">{{$ispit->naziv}}</td>
                    <td style="border: 1px solid black; width:50px; text-align: center;">{{$ispit->espb}}</td>
                    <td style="border: 1px solid black; width:50px; text-align: center;">{{$ispit->konacnaOcena}}</td>
                    <td style="border: 1px solid black; width:100px; text-align: center;">
                            @if($ispit->konacnaOcena == 6)шест
                            @endif
                            @if($ispit->konacnaOcena == 7)седам
                            @endif
                            @if($ispit->konacnaOcena == 8)осам
                            @endif
                            @if($ispit->konacnaOcena == 9)девет
                            @endif
                            @if($ispit->konacnaOcena == 10)десет
                            @endif
                    </td>
                </tr>
            @endforeach
        </table>
        Закључно са редним бројем {{$index + 1}}.
    </div>
    <div>Просечна оцена у току студија {{ number_format($prosek, 2) }}.</div>
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
            <td>Овлашћено лице факултета</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>