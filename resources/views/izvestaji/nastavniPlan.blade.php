<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($program && $predmeti)

    <div>

        <h1 style="padding-bottom: 100px;">Наставни план и програм за смер {{$program}}</h1>
        <br/>
        <br/>

        <table>
            <tr>
                <td style="width:8%"></td>
                <td style="width:84%">
                    <table style="border: 1px solid black;">
                        <thead>
                        <tr>
                            <th style="border: 1px solid black; width: 40px; background-color: grey; "> <b>Р. бр.</b>
                            </th>
                            <th style="border: 1px solid black; width: 250px; background-color: grey;"> <b>Назив</b>
                            </th>
                            <th style="border: 1px solid black; width: 65px; background-color: grey;"> <b>Семестар</b>
                            </th>
                            <th style="border: 1px solid black; background-color: grey;"> <b>Тип</b>
                            </th>
                            <th style="border: 1px solid black; width: 50px; background-color: grey;"> <b>Вежбе</b>
                            </th>
                            <th style="border: 1px solid black; width: 75px; background-color: grey;"> <b>Предавања</b>
                            </th>
                            <th style="border: 1px solid black; width: 50px; background-color: grey;"> <b>ЕСПБ</b>
                            </th>
                        </tr>
                        </thead>
                        <?php $a = 0;?>
                        @foreach($predmeti as $item)
                            <?php $a++; ?>
                            <tr>
                                <td style="border: 1px solid black; width: 40px;"> {{$a}}</td>
                                <td style="border: 1px solid black; width: 250px;"> {{$item->predmet->naziv}}</td>
                                <td style="border: 1px solid black; width: 65px; text-align: center;"> {{$item->semestar}}</td>
                                <td style="border: 1px solid black;"> {{$item->tipPredmeta->naziv}}</td>
                                <td style="border: 1px solid black; width: 50px; text-align: center;"> {{$item->vezbe}}</td>
                                <td style="border: 1px solid black; width: 75px; text-align: center;"> {{$item->predavanja}}</td>
                                <td style="border: 1px solid black; width: 50px; text-align: center;"> {{$item->espb}}</td>
                            </tr>

                        @endforeach
                    </table>
                </td>
                <td style="width:8%"></td>
            </tr>
        </table>


    </div>
<br/>
<br/>
<br/>

@else
    <h1>Нема података.</h1>
@endif






















