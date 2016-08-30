<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($ispiti !== '')

    <div>

        <p style="padding-bottom: 100px;">Списак положених испита по захтеву који је поднео студент {{$student->imeKandidata}} {{$student->prezimeKandidata}}</p>
        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black;"><b>Назив</b>
                </th>
                <th style="border: 1px solid black;"><b>Оцена усмени</b>
                </th>
                <th style="border: 1px solid black;"><b>Оцена писмени</b></th>
                <th style="border: 1px solid black;"><b>ЕСПБ</b>
                </th>
            </tr>
            </thead>
            @foreach($ispiti as $ispit)
                <tr>
                    <td style="border: 1px solid black;">{{$ispit->predmet->naziv}}</td>
                    <td style="border: 1px solid black;">{{$ispit->ocenaUsmeni}}</td>
                    <td style="border: 1px solid black;">{{$ispit->ocenaPismeni}}</td>
                    <td style="border: 1px solid black;">{{$ispit->predmet->espb}}</td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>Нема положених испита.</h1>
@endif


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