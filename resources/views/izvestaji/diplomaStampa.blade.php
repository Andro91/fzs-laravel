<div style="height: 70px;"><img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($student !== '')
    <div style="text-align: left"><label>Број: {{$diploma->broj}}</label> <br/>
        <label>Датум: {{$diploma->datumOdbrane}}</label>
    </div>
    <div>
        <p style="text-align: justify;">{{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}}) {{$student->prezimeKandidata}} је
            поднео захтев Универзитету ''Унион - Никола Тесла'',
            Факултету за спорт у Београду, да сходно члану 99. Закона о високом образовању (''Сл. Гласник РС'' бр.
            76/2005, 97/2008 и 93/2012), а на основу службене
            евиденције Факултета за спорт Универзитета ''Унион'' у Београду и у складу са чланом 161 Закона о опште
            управном поступку (''Сл. лист СРЈ'' бр. 97/97, 31/2001 и
            ''Сл. гласника РС'' бр 30/2010), изда:</p>

        <p style="text-align: center;">

        <h1>УВЕРЕЊЕ</h1><br/>

        <h4>О СТЕЧЕНОМ ВИСОКОМ ОБРАЗОВАЊУ</h4><br/>

        <span>{{$student->imeKandidata}} ({{$student->imePrezimeJednogRoditelja}}) {{$student->prezimeKandidata}} </span><br/>
        </p>

        <p style="text-align: justify;">рођен/а {{ date('d.m.Y.',strtotime($student->datumRodjenja)) }} године,
            место {{$student->mestoRodjenja->naziv}}, општина {{$student->mestoRodjenja->naziv}},
            Република Србија, уписан школске {{$student->godinaUpisa->naziv}}
            у {{$student->godinaStudija->nazivSlovimaUPadezu}} годину, тип
            студија {{$student->program->tipStudija->naziv}}.
        </p>

        <p style="text-align: justify;">Студент је положио све испите прописане Статутом факултета и наставним планом и програмом и дана <b>{{$diplomski->datumOdbrane}}</b>
            године завршио {{$student->program->tipStudija->naziv}}
            првог степена на Факултету за спорт у Београду, на студијском програму <b>{{$student->program->naziv}}</b> у
            трајању од четири године, обима <b>240</b> ЕСПБ (двестотинечетрдесет бодова),
            са просечном оценом <b>7,73 </b>(7 и 73/100) у току студирања.
        </p>

        <p>На основу наведеног издаје се уверење о стеченом високом образовању и стручном називу
        </p>

        <p style="text-align: center;"><h1>{{$student->program->zvanje}}
        </h1></p>

        <p>Ово уверење служи као доказ о стеченом образовању и може се користити до издавања дипломе.</p>

        <p>Уверење се издаје без наплате таксе, сходно члану 19. Закона о административним таксама (''Сл. гласник РС'',
             бр. 43/2003, 51/2003 и 61/2005)</p>

        <br/>
        <br/>


    </div>
@else
    <h1>Нема регистрованих студената</h1>
@endif


<br/>

<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td style="border-top: 1px solid black;">{{$diploma->potpis->zvanje}} {{$diploma->potpis->ime}} {{$diploma->potpis->prezime}}, {{$diploma->funkcija}}</td>
        </tr>
    </table>
</div>






















