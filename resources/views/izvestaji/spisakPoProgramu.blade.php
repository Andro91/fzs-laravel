<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак студената на смеру {{$program->naziv}}</h1>
    <br/>
    <br/>




                <label style="padding-bottom: 10px;"></label>
                <br/>
                <br/>
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black;">Р.бр.</th>
                        <th style="border: 1px solid black;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black; width: 50px;"><b>Година</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0; $b = 0; ?>
                    @foreach($kandidat as $index => $item)

                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;">{{$a}}</td>
                                <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                                <td style="border: 1px solid black;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black; text-align: right; width: 50px;">{{$item->godina}}</td>
                            </tr>


                    @endforeach
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

