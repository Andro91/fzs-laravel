<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак студената</h1>
    <br/>
    <br/>
    @foreach($tip as $tip)
        <h1 style="padding-bottom: 100px;">{{$tip->naziv}}</h1>
        @foreach($tipSvi as $test)


            @if($test->id == $tip->id)

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
                        <th style="border: 1px solid black;width:75px;"><b>Телефон</b>
                        </th>
                        <th style="border: 1px solid black;width:150px;"><b>Мејл адреса</b>
                        </th>
                        <th style="border: 1px solid black;"><b>Програм</b>
                        </th>
                        <th style="border: 1px solid black;width:55px;"><b>Година</b>
                        </th>
                        <th style="border: 1px solid black;width:120px;"><b>Место становања</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0;?>
                    @foreach($kandidat as $index => $item)
                        @if($item->tipStudija_id == $test->id)
                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;width:35px;">{{$a}}</td>
                                <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                                <td style="border: 1px solid black;width:150px;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                <td style="border: 1px solid black;width:75px;">{{$item->kontaktTelefon}}</td>
                                <td style="border: 1px solid black;width:150px;">{{$item->email}}</td>
                                <td style="border: 1px solid black;">{{$item->program}}</td>
                                <td style="border: 1px solid black;width:55px;">{{$item->godina}}</td>
                                <td style="border: 1px solid black;width:120px;">{{$item->adresaStanovanja}}</td>
                            </tr>
                        @endif

                    @endforeach
                </table>
                <br/>
                <br/>
                <br/>
            @endif

        @endforeach

</div>
@endforeach