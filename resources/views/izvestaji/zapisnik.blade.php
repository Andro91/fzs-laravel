<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if(!$polozeniIspiti->isEmpty())

    <div style="text-align: center;">
        <?php $a = 0;?>
        <h1 style="padding-bottom: 100px;">Записник о полагању испита</h1>
        <table>
            <tr>
                <td>
                    <div style="text-align: left;">
                        <h4>Предмет: {{ $predmet }}</h4>
                        <h4>Испитни рок: {{ $rok }}</h4>
                        <h4>Професор: {{ $profesor }}</h4>
                        <b>Студијски програм:</b> @foreach($programi as $program)
                            <?php $a++;?>
                            @if($a == $programi->count())<label><b>{{$program->naziv}}</b></label>@else<label><b>{{$program->naziv}}, </b></label>@endif
                        @endforeach
                    </div>
                </td>
                <td>
                    <div style="text-align: right;">
                        <h4>Датум: {{ date('d.m.Y.',strtotime($datum)) }}</h4>
                        <h4>Време: {{ $vreme }}</h4>
                        <h4>Учионица: {{ $ucionica }}</h4>
                    </div>
                </td>
            </tr>
        </table>

        <br/>
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
                    <td style="border: 1px solid black; text-align: left;">{{$ispit->kandidat->brojIndeksa}}</td>
                    <td style="border: 1px solid black; text-align: left; width:155px;">{{$ispit->kandidat->imeKandidata}} {{$ispit->kandidat->prezimeKandidata}}</td>
                    <td style="border: 1px solid black; text-align: center;">{{$ispit->prijava->brojPolaganja}}</td>
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










