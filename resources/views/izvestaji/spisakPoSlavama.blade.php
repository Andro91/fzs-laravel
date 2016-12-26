<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак студената по славама</h1>
    <br/>
    <br/>


    @foreach($uslov as $test)

        @foreach($slave as $broj => $slava)
            @if($test->krsnaSlava_id == $slava->id)
                <label style="padding-bottom: 10px;">{{$slava->naziv}} - {{$slava->datumSlave}}</label>
                <br/>
                <br/>
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black; width: 40px; background-color: grey;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black;width: 170px; background-color: grey;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black;width: 170px; background-color: grey;"><b>Мејл</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0; $b = 0; ?>
                    @foreach($kandidat as $index => $item)
                        @if($item->krsnaSlava_id == $slava->id)
                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;width: 40px;">{{$a}}</td>
                                <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                                <td style="border: 1px solid black; width: 170px;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black;width: 170px;">{{$item->email}}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>
                <br/>
                <br/>
                <br/>
            @endif
        @endforeach
    @endforeach

</div>