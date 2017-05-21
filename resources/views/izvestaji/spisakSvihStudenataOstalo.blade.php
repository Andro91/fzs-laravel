<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if(1==1)

    <div>

        <h1 style="padding-bottom: 100px;">Списак судената</h1>
        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; background-color: grey;"></th>
                <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Презиме и име</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Програм</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Статус</b>
                </th>
            </tr>
            </thead>
            @foreach($kandidat as $index => $item)
                <tr>
                    <td style="border: 1px solid black;">{{$index + 1}}</td>
                    <td style="border: 1px solid black;">{{SUBSTR($item->brojIndeksa, 5)}}/{{SUBSTR($item->brojIndeksa, 0, 4)}}</td>
                    <td style="border: 1px solid black;">{{$item->prezimeKandidata}} {{$item->imeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->program->naziv}}</td>
                    <td style="border: 1px solid black;">@if($item->statusUpisa_id == 1)Уписан @elseif($item->statusUpisa_id == 2)Исписан @elseif($item->statusUpisa_id == 4)Обновио @elseif($item->statusUpisa_id == 5)Завршио @elseif($item->statusUpisa_id == 6)Дипломирао @elseif($item->statusUpisa_id == 7)Мировање @endif</td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>Нема дипломираних студената у овом периоду.</h1>
@endif

























