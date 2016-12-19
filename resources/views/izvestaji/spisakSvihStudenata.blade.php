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

                    <h1 style="padding-bottom: 100px;">{{$bla->naziv}} година</h1>


                <br/>
                <br/>
                <table style="border: 1px solid black;">
                    <thead>
                    <tr>
                        <th style="border: 1px solid black;width:35px;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black;width:150px;"><b>Име и презиме</b>
                        </th>
                        <th style="border: 1px solid black;width:90px;"><b>Телефон</b>
                        </th>
                        <th style="border: 1px solid black;width:170px;"><b>Мејл адреса</b>
                        </th>
                        <th style="border: 1px solid black;width:60px;"><b>Програм</b>
                        </th>
                        <th style="border: 1px solid black;width:55px;"><b>Статус</b>
                        </th>
                        <th style="border: 1px solid black;width:120px;"><b>Место становања</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0;?>
                    @foreach($kandidat as $index => $item)
                        @if($item->tipStudija_id == $test->id && $item->godinaStudija_id == $bla->id)
                            <?php $a++;?>
                            <tr>
                                <td style="border: 1px solid black;width:35px;">{{$a}}</td>
                                <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                                <td style="border: 1px solid black;width:150px;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black;width:90px;">{{$item->kontaktTelefon}}</td>
                                <td style="border: 1px solid black;width:170px;">{{$item->email}}</td>
                                <td style="border: 1px solid black;width:60px;">{{$item->program}}</td>
                                <td style="border: 1px solid black;width:55px;">@if($item->godina == 1)Уписан/а@elseif($item->godina == 2)Одустао/ла@elseif($item->godina == 4)Обновио/ла@elseif($item->godina == 5)Завршио/ла@endif</td>
                                <td style="border: 1px solid black;width:120px;">{{$item->adresaStanovanja}}</td>
                            </tr>
                        @endif

                    @endforeach
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