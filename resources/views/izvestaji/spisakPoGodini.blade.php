<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак студената уписаних у {{$godinaNaziv->nazivSlovimaUPadezu}} годину</h1>
    <br/>
    <br/>
    <br/>
    <br/>
    <table>
        <tr>
            <td style="width:5%"></td>
            <td style="width:90%">
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black;width:30px"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black;width:300px"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black;width:150px"><b>Програм</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0; $b = 0; ?>
                    @foreach($kandidat as $index => $item)
                        @if($item->godinaStudija_id == $godina)
                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;width:30px">{{$a}}</td>
                                <td style="border: 1px solid black;width:300px">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black;width:150px">{{$item->program}}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>
            </td>
            <td style="width:5%"></td>
        </tr>
    </table>

    <br/>
    <br/>
    <br/>
</div>


<br/>
<br/>
<br/>
<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Председник комисије</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>

