<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<h1></h1>
<h1></h1>

@if($diplomski != null)



    <table>
        <tr>
            <td>СТУДИЈСКИ ПРОГРАМ</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; width: 200px;">{{mb_strtoupper($diplomski->student->program->naziv, "utf-8")}}</td>
        </tr>
    </table>

    <h1></h1>

    <table>
        <tr>
            <td>ПРЕДМЕТ</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; width: 300px;">{{mb_strtoupper($diplomski->predmet->predmet->naziv, "utf-8")}}</td>
        </tr>
    </table>

    <h1></h1>

    <table>
        <tr>
            <td>НАСЛОВ ДИПЛОМСКОГ РАДА</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; width: 500px;">{{mb_strtoupper($diplomski->nazivTeme, "utf-8")}}</td>
        </tr>
    </table>

    <h1></h1>

    <table>
        <tr>
            <td>СТУДЕНТ</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; width: 300px;">{{mb_strtoupper($diplomski->student->imeKandidata, "utf-8")}} ({{$diplomski->student->imePrezimeJednogRoditelja}})
                {{mb_strtoupper($diplomski->student->prezimeKandidata, "utf-8")}}</td>
        </tr>
    </table>

    <h1></h1>

    <table>
        <tr>
            <td>БРОЈ ИНДЕКСА</td>
        </tr>
        <tr>
            <td style="border: 1px solid black; width: 120px;">{{SUBSTR($diplomski->student->brojIndeksa, 5)}}/{{SUBSTR($diplomski->student->brojIndeksa, 0, 4)}}</td>
        </tr>
    </table>

    <h1>&nbsp;</h1>
    <h1>&nbsp;</h1>

    <table style="border: 1px solid black; text-align: center;">
        <thead>
        <tr>
            <th style="border: 1px solid black; width: 210px;"><b>Датум одржавања испита</b></th>
            <th style="border: 1px solid black; width: 100px;"><b>ЕСПБ</b>
            </th>
            <th style="border: 1px solid black;width: 220px;"><b>ОЦЕНА</b>
            </th>
        </tr>
        </thead>
                <tr style="line-height: 500%;">
                    <td style="border: 1px solid black;width: 210px;">{{date('d.m.Y.',strtotime($diplomski->datum))}}
                    </td>
                    <td style="border: 1px solid black;width: 100px;">{{$diplomski->predmet->espb}}</td>
                    <td style="border: 1px solid black; width: 220px;"></td>
                </tr>
    </table>

    <h1>&nbsp;</h1>

    <table>
        <tr>
            <td style="width: 210px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 220px;">Комисија за одбрану дипломског рада у саставу:</td>
        </tr>
    </table>

    <h1></h1>

    <table >
        <tr>
            <td style="width: 210px;"></td>
            <td style="padding-bottom: 10px; width: 100px;"></td>
            <td style="border-bottom: 1px solid black; width: 220px;">др {{$diplomski->predsednik->ime}} {{$diplomski->predsednik->prezime}}</td>
        </tr>
        <tr>
            <td style="width: 210px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 220px;">Презиме и име председника испитне комисије</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 210px;"></td>
            <td style="padding-bottom: 10px; width: 100px;"></td>
            <td style="border-bottom: 1px solid black; width: 220px;">др {{$diplomski->profesor->ime}} {{$diplomski->profesor->prezime}}</td>
        </tr>
        <tr>
            <td style="width: 210px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 220px;">Презиме и име члана испитне комисије</td>
        </tr>
    </table>

    <table>
        <tr>
            <td style="width: 210px;"></td>
            <td style="padding-bottom: 10px; width: 100px;"></td>
            <td style="border-bottom: 1px solid black; width: 220px;">др {{$diplomski->clan->ime}} {{$diplomski->clan->prezime}}</td>
        </tr>
        <tr>
            <td style="width: 210px;"></td>
            <td style="width: 100px;"></td>
            <td style="width: 220px;">Презиме и име члана испитне комисије</td>
        </tr>
    </table>

    <h1>&nbsp;</h1>

    <table>
        <tr>
            <td style="width: 210px;">У Београду</td>
            <td style="width: 100px;"></td>
            <td style="width: 220px;"></td>
        </tr>
        <tr>
            <td style="border-bottom: 1px solid black; width: 100px;"></td>
            <td style="width: 100px;">године</td>
            <td style="width: 220px;"></td>
        </tr>
    </table>

@else
    <h1>Нема.</h1>
@endif










