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
                <th style="border: 1px solid black;"><b>Назив</b>
                </th>
                <th style="border: 1px solid black;"><b>ЕСПБ</b>
                </th>
                <th style="border: 1px solid black;"><b>Вежбе</b>
                </th>
                <th style="border: 1px solid black;"><b>Предавања</b>
                </th>
            </tr>
            </thead>
            @foreach($predmeti as $item)
                <tr>
                    <td style="border: 1px solid black;">{{$item->predmet->naziv}}</td>
                    <td style="border: 1px solid black;">{{$item->espb}}</td>
                    <td style="border: 1px solid black;">{{$item->vezbe}}</td>
                    <td style="border: 1px solid black;">{{$item->predavanja}}</td>
                </tr>

            @endforeach
        </table>
    </div>
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

@else
    <h1>Нема података.</h1>
@endif






















