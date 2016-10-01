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


                @if($test->id== $tip->id)

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
                            <th style="border: 1px solid black;"><b>Телефон</b>
                            </th>
                            <th style="border: 1px solid black;"><b>Мејл адреса</b>
                            </th>
                            <th style="border: 1px solid black;"><b>Програм</b>
                            </th>
                            <th style="border: 1px solid black;"><b>Место становања</b>
                            </th>
                            <th style="border: 1px solid black;"><b>Датум уписа</b>
                            </th>
                        </tr>
                        </thead>
                        <?php $a = 0;?>
                        @foreach($kandidat as $index => $item)

                                <?php $a++; ?>
                                <tr>
                                    <td style="border: 1px solid black;">{{$a}}</td>
                                    <td style="border: 1px solid black;">{{$item->brojIndeksa}}</td>
                                    <td style="border: 1px solid black;">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                                    <td style="border: 1px solid black;">{{$item->kontaktTelefon}}</td>
                                    <td style="border: 1px solid black;">{{$item->email}}</td>
                                    <td style="border: 1px solid black;">{{$item->program}}, {{$item->godina}}. година</td>
                                    <td style="border: 1px solid black;">{{$item->adresaStanovanja}}</td>
                                    <td style="border: 1px solid black;">{{$item->datumStatusa}}</td>
                                </tr>


                        @endforeach
                    </table>
                    <br/>
                    <br/>
                    <br/>
                @endif

        @endforeach

</div>
@endforeach


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

