<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if(1==1)

    <div style="text-align: center;">
        <?php $a = 0;?>

            <table cellspacing='0' cellpadding='0' border='0'>
                <tr>
                    <td><div style="font-size: 20px; page-break-inside: avoid;"> Записник о полагању испита </div></td>
                </tr>
            </table>
            <table cellspacing='0' cellpadding='0' border='0'>
            <tr>
                <td>
                    <div style="text-align: left; page-break-inside: avoid;"><span>Предмет: {{ $predmet }}</span><br/>
                        <span>Испитни рок: {{ $rok }}</span><br/>
                        <span>Професор: {{ $profesor }}</span><br/>
                        <b>Студијски програм:</b> @foreach($programi as $program)
                            <?php $a++;?>
                            @if($a == $programi->count())<label><b>{{$program->naziv}}</b></label>@else<label><b>{{$program->naziv}}, </b></label>@endif
                        @endforeach
                    </div>
                </td>
                <td>
                    <div style="text-align: right; page-break-inside: avoid;">
                        <span>Датум: {{ date('d.m.',strtotime($datum)) }}/{{ date('d.m.Y.',strtotime($datum2)) }}</span><br/>
                        <span>Време: {{ $vreme }}</span><br/>
                        <span>Учионица: {{$ucionica}} </span><br/>
                    </div>
                </td>
            </tr>
        </table>

        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; width: 40px; background-color: grey;"><b>Р. бр.</b></th>
                <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black; width:155px; background-color: grey;"><b>Име и презиме</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Број полагања</b>
                </th>
                <th style="border: 1px solid black; width:70px; background-color: grey;"><b>Број бодова</b>
                </th>
                <th style="border: 1px solid black; width:100px; background-color: grey;"><b>Коначна оцена</b>
                </th>
            </tr>
            </thead>
            @foreach($polozeniIspiti as $index => $ispit)
                <tr>
                    <td style="border: 1px solid black; width: 40px;">{{$index + 1}}</td>
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->indeks}}</td>
                    <td style="border: 1px solid black; text-align: left; width:155px;">{{$ispit->imeKandidata}} {{$ispit->prezimeKandidata}}</td>
                    <td style="border: 1px solid black; text-align: center;">{{$ispit->polaganja}}</td>
                    <td style="border: 1px solid black; width:70px;"></td>
                    <td style="border: 1px solid black; text-align: left; width:100px;"></td>
                </tr>
            @endforeach
            <tr>
                <td style="border: 1px solid black; width: 40px;"></td>
                <td style="border: 1px solid black; text-align: left;"></td>
                <td style="border: 1px solid black; text-align: left; width:155px;"></td>
                <td style="border: 1px solid black; text-align: center;"></td>
                <td style="border: 1px solid black; width:70px;"></td>
                <td style="border: 1px solid black; text-align: left; width:100px;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; width: 40px;"></td>
                <td style="border: 1px solid black; text-align: left;"></td>
                <td style="border: 1px solid black; text-align: left; width:155px;"></td>
                <td style="border: 1px solid black; text-align: center;"></td>
                <td style="border: 1px solid black; width:70px;"></td>
                <td style="border: 1px solid black; text-align: left; width:100px;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; width: 40px;"></td>
                <td style="border: 1px solid black; text-align: left;"></td>
                <td style="border: 1px solid black; text-align: left; width:155px;"></td>
                <td style="border: 1px solid black; text-align: center;"></td>
                <td style="border: 1px solid black; width:70px;"></td>
                <td style="border: 1px solid black; text-align: left; width:100px;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; width: 40px;"></td>
                <td style="border: 1px solid black; text-align: left;"></td>
                <td style="border: 1px solid black; text-align: left; width:155px;"></td>
                <td style="border: 1px solid black; text-align: center;"></td>
                <td style="border: 1px solid black; width:70px;"></td>
                <td style="border: 1px solid black; text-align: left; width:100px;"></td>
            </tr>
            <tr>
                <td style="border: 1px solid black; width: 40px;"></td>
                <td style="border: 1px solid black; text-align: left;"></td>
                <td style="border: 1px solid black; text-align: left; width:155px;"></td>
                <td style="border: 1px solid black; text-align: center;"></td>
                <td style="border: 1px solid black; width:70px;"></td>
                <td style="border: 1px solid black; text-align: left; width:100px;"></td>
            </tr>
        </table>
    </div>

    <br/>
    <br/>
    <br/>
    <div>
        <table nobr="true">
            <tr>
                <td></td>
                <td></td>
                <td>Потпис испитивача</td>
            </tr>
            <tr>
                <td></td>
                <td style="padding-bottom: 10px;"></td>
                <td style="border-bottom: 1px solid black;"></td>
            </tr>
        </table>
    </div>

@else
    <h1>Нема.</h1>
@endif










