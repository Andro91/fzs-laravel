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
            <td style="width:3%"></td>
            <td style="width:94%">
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black; width:30px; background-color: grey;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black; width:65px; background-color: grey;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black; width:210px; background-color: grey;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black; width:180px; background-color: grey;"><b>Мејл</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0;?>
                    @foreach($studenti as $index => $item)
                        <?php $a++; ?>
                        <tr>
                            <td style="border: 1px solid black;width:30px">
                                {{$a}}</td>
                            <td style="border: 1px solid black;width:65px">
                                {{$item->brojIndeksa}}</td>
                            <td style="border: 1px solid black;width:210px">
                                {{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                            <td style="border: 1px solid black;width:180px">
                                {{$item->email}}</td>
                        </tr>
                    @endforeach
                </table>
            </td>
            <td style="width:3%"></td>
        </tr>
    </table>

</div>
    @else
    <h1>Нема регистрованих студената</h1>
    @endif















