<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($program !== '')

<div>

    <h1 style="padding-bottom: 100px;">Списак студената на смеру {{$program}}</h1>
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
                        <th style="border: 1px solid black;width:65px"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black;width:300px"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black;width:70px"><b>Број бодова</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0;?>
                    @foreach($studenti as $item)
                        <?php $a++; ?>
                        <tr>
                            <td style="border: 1px solid black;width:30px">{{$a}}</td>
                            <td style="border: 1px solid black;width:65px">{{$item->brojIndeksa}}</td>
                            <td style="border: 1px solid black;width:300px">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                            <td style="border: 1px solid black;width:70px">{{$item->brojBodovaTest}}</td>
                        </tr>

                    @endforeach
                </table>
            </td>
            <td style="width:5%"></td>
        </tr>
    </table>

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






















