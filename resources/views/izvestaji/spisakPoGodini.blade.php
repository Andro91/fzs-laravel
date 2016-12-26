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
                        <th style="border: 1px solid black; width:30px; background-color: grey;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black; width:100px; background-color: grey;"><b>Број индекса</b></th>
                        <th style="border: 1px solid black; width:200px; background-color: grey;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black;width:150px"><b>Програм</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0; $b = 0; ?>
                    @foreach($kandidat as $index => $item)

                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;width:30px">{{$a}}</td>
                                <td style="border: 1px solid black;width:100px">{{$item->brojIndeksa}}</td>
                                <td style="border: 1px solid black;width:200px">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black;width:150px">{{$item->program}}</td>
                            </tr>


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