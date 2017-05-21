<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if(1==1)

    <div>

        <h1 style="padding-bottom: 100px;">Списак дипломираних судената</h1>
        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; background-color: grey;"></th>
                <th style="border: 1px solid black; background-color: grey;"><b>Број индекса</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Презиме</b>
                </th>
                <th style="border: 1px solid black; background-color: grey;"><b>Име</b>
                </th>
            </tr>
            </thead>
            @foreach($diplomirani as $index => $item)
                <tr>
                    <td style="border: 1px solid black;">{{$index + 1}}</td>
                    <td style="border: 1px solid black;">{{SUBSTR($item->brojIndeksa, 5)}}/{{SUBSTR($item->brojIndeksa, 0, 4)}}</td>
                    <td style="border: 1px solid black;">{{$item->prezimeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->imeKandidata}}</td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>Нема дипломираних студената у овом периоду.</h1>
@endif


<br/>
<br/>
<br/>
<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>Овлашћено лице</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>






















