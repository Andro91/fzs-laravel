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
                        <th style="border: 1px solid black;width:35px; background-color: grey;"><b>Р.бр.</b></th>
                        <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                        </th>
                        <th style="border: 1px solid black;width:150px; background-color: grey;"><b>Презиме и име</b>
                        </th>
                        <th style="border: 1px solid black;width:75px; background-color: grey;"><b>Телефон</b>
                        </th>
                        <th style="border: 1px solid black;width:150px; background-color: grey;"><b>Мејл адреса</b>
                        </th>
                        <th style="border: 1px solid black; background-color: grey;"><b>Програм</b>
                        </th>
                        <th style="border: 1px solid black;width:55px; background-color: grey;"><b>Година</b>
                        </th>
                        <th style="border: 1px solid black;width:120px; background-color: grey;"><b>Место становања</b>
                        </th>
                    </tr>
                    </thead>
                    <?php $a = 0;?>
                    @foreach($kandidat as $index => $item)
                        @if($item->tipStudija_id == $test->id)
                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black;width:35px;">{{$a}}</td>
                                <td style="border: 1px solid black;">{{SUBSTR($item->brojIndeksa, 5)}}/{{SUBSTR($item->brojIndeksa, 0, 4)}}</td>
                                <td style="border: 1px solid black;width:150px;">{{$item->prezimeKandidata}} {{$item->imeKandidata}}</td>
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