<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div style="width:100%;height:100%;">
    <h1 style="padding-bottom: 100px;">Списак студената на смеру {{$program->naziv}}</h1>
    <br/>
    <br/>
    <br/>
    <br/>

    <table>
        <tr>
            <td style="width:5%"></td>
            <td style="width:90%">
                <table style="border: 1px solid black;width:480px">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black; width:30px; background-color: grey;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black; width:65px; background-color: grey;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black; width:300px; background-color: grey;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black; width:50px; background-color: grey;"><b>Година</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0; $b = 0; ?>
                    @foreach($kandidat as $index => $item)

                        <?php $a++; ?>
                        <tr>
                            <td style="border: 1px solid black;width:30px;">
                                {{$a}}</td>
                            <td style="border: 1px solid black;width:65px;">
                                {{$item->brojIndeksa}}</td>
                            <td style="border: 1px solid black;width:300px;">
                                {{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                            <td style="border: 1px solid black;text-align: right;width:50px;">
                                {{$item->godina}}</td>
                        </tr>

                    @endforeach
                </table>
            </td>
            <td style="width:5%"></td>
        </tr>
    </table>

</div>