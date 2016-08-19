<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($program !== '')

<div>

    <h1 style="padding-bottom: 100px;">Списак студената на смеру {{$program}}</h1>
    <br/>
    <br/>

    <table style="border: 1px solid black;">
        <thead>
        <tr>
            <th style="border: 1px solid black;">
                Име
            </th>
            <th style="border: 1px solid black;">
                Презиме
            </th>
            <th style="border: 1px solid black;">
                Број бодова
            </th>
        </tr>
        </thead>
        @foreach($studenti as $item)
                <tr>
                    <td style="border: 1px solid black;">{{$item->imeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->prezimeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->brojBodovaTest}}</td>
                </tr>

        @endforeach
    </table>
</div>
    @else
    <h1>Нема регистрованих студената</h1>
    @endif


<br/>
<br/>
<br/>
<div>
    <!--<table>
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
    </table>-->
</div>






















