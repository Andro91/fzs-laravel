<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак студената</h1>
    <br/>
    <br/>
    <?php $zbir = 0;?>
    @foreach($tip as $tip)
        <h1 style="padding-bottom: 100px;">{{$tip->naziv}}</h1>
        @foreach($tipSvi as $test)

        @if($test->id == $tip->id)

        @foreach($godina as $bla)

        @if($bla->id <= 4 && $tip->id == 1 || $bla->id == 1 && $tip->id == 2)

                <!--<h1 style="padding-bottom: 100px;">{{$bla->naziv}} година</h1>-->
        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; width:35px; background-color: grey;"><b>Р.бр.</b></th>
                <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black; width:150px; background-color: grey;"><b>Име и презиме</b>
                </th>
                <th style="border: 1px solid black; width:90px; background-color: grey;"><b>Телефон</b>
                </th>
                <th style="border: 1px solid black; width:170px; background-color: grey;"><b>Мејл адреса</b>
                </th>
                <th style="border: 1px solid black; width:60px; background-color: grey;"><b>Програм</b>
                </th>
                <th style="border: 1px solid black; width:70px; background-color: grey;"><b>Статус</b>
                </th>
                <th style="border: 1px solid black; width:120px; background-color: grey;"><b>Место становања</b>
                </th>
            </tr>
            </thead>
            <?php $a = 0;?>

            @foreach($kandidat as $index => $item)
                @if($item->tipStudija_id == $test->id && $item->godina == $bla->id)
                    <?php $a++;?>
                    <tr>
                        <td style="border: 1px solid black; width:35px;">{{$a}}</td>
                        <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                        <td style="border: 1px solid black;width:150px;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                        <td style="border: 1px solid black;width:90px;">{{$item->kontaktTelefon}}</td>
                        <td style="border: 1px solid black;width:170px;">{{$item->email}}</td>
                        <td style="border: 1px solid black;width:60px;">{{$item->program}}</td>
                        <td style="border: 1px solid black;width:70px;">@if($item->status == 1)Уписан @elseif($item->status == 2)Исписан @elseif($item->status == 4)Обновио @elseif($item->status == 5)Завршио @elseif($item->status == 6)Дипломирао @elseif($item->status == 7)Мировање @endif</td>
                        <td style="border: 1px solid black;width:120px;">{{$item->adresaStanovanja}}</td>
                    </tr>
                @endif

            @endforeach
            <tr>
                <td colspan="8"><b>{{$bla->naziv}} година, укупан број студената: {{$a}}</b></td>
            </tr>
            <?php $zbir = $zbir + $a;?>
        </table>
        <br/>
        <br/>
        <br/>

        @endif

    @endforeach

    @endif

    @endforeach

</div>
@endforeach

Укупан број студената на факултету: {{$zbir}}