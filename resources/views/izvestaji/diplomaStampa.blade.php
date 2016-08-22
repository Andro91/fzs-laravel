<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($student !== '')
    <div style="text-align: left">
        <label>Број: {{$diploma->broj}}</label> <br/>
        <label>Датум: {{$diploma->datumOdbrane}}</label>
    </div>
    <div>
        <p style="text-align: justify;">
            {{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}}) {{$student->prezimeKandidata}} је
            поднео захтев Универзитету ''Унион - Никола Тесла'',
            Факултету за спорт у Београду, да сходно члану 99. Закона о високом образовању (''Сл. Гласник РС'' бр.
            76/2005, 97/2008 и 93/2012), а на основу службене
            евиденције Факултета за спорт Универзитета ''Унион'' у Београду и у складу са чланом 161 Закона о опште
            управном поступку (''Сл. лист СРЈ'' бр. 97/97, 31/2001 и
            ''Сл. гласника РС'' бр 30/2010), изда:
        </p>

        <p style="text-align: center;">

        <h1 style="padding-bottom: 100px;">УВЕРЕЊЕ</h1>

        <h3 style="padding-bottom: 100px;">О СТЕЧЕНОМ ВИСОКОМ ОБРАЗОВАЊУ</h3>

        <h1>{{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}}) {{$student->prezimeKandidata}} </h1>
        </p>

        <p>
            рођен/а {{ date('d.m.Y.',strtotime($student->datumRodjenja)) }} године, место {{$student->mestoRodjenja->naziv}}, општина {{$student->mestoRodjenja->naziv}},
            Република Србија, уписан школске {{$student->godinaUpisa->naziv}} у {{$student->godinaStudija->nazivSlovimaUPadezu}} годину, тип студија {{$student->program->tipStudija->naziv}}.
        </p>

        <p>
            ТЕСТ
        </p>

        <br/>
        <br/>


    </div>
@else
    <h1>Нема регистрованих студената</h1>
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






















