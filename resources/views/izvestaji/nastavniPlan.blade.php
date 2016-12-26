<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($program && $predmeti)

    <div>

        <h1 style="padding-bottom: 100px;">Наставни план и програм за смер {{$program}}</h1>
        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; background-color: grey;"><b>Р. бр.</b>
                </th>
                <th style="border: 1px solid black; width: 200px; background-color: grey;"><b>Назив</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;">Семестар
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Тип</b>
                </th>
                <th style="border: 1px solid black; width: 50px; background-color: grey;"><b>Вежбе</b>
                </th>
                <th style="border: 1px solid black; width: 75px; background-color: grey;"><b>Предавања</b>
                </th>
                <th style="border: 1px solid black; width: 50px; background-color: grey;"><b>ЕСПБ</b>
                </th>
            </tr>
            </thead>
            <?php $a = 0;?>
            @foreach($predmeti as $item)
                <?php $a++; ?>
                <tr>
                    <td style="border: 1px solid black;">{{$a}}</td>
                    <td style="border: 1px solid black; width: 200px;">{{$item->predmet->naziv}}</td>
                    <td style="border: 1px solid black;">{{$item->semestar}}</td>
                    <td style="border: 1px solid black;">{{$item->tipPredmeta->naziv}}</td>
                    <td style="border: 1px solid black; width: 50px;">{{$item->vezbe}}</td>
                    <td style="border: 1px solid black; width: 75px;">{{$item->predavanja}}</td>
                    <td style="border: 1px solid black; width: 50px;">{{$item->espb}}</td>
                </tr>

            @endforeach
        </table>
    </div>
<br/>
<br/>
<br/>

@else
    <h1>Нема података.</h1>
@endif






















