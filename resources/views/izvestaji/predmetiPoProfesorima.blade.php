<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>

<div>
    <h1 style="padding-bottom: 100px;">Списак предмета по професорима</h1>
    <br/>
    <br/>

    @foreach($profesori as $profesor)
        <h1 style="padding-bottom: 100px;">{{$profesor->ime}} {{$profesor->prezime}}</h1>
        <?php $a = 0; $b = 0; ?>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black; background-color: grey;"><b>Р.бр.</b></th>
                <th style="border: 1px solid black; background-color: grey;"><b>Назив</b>
                </th>
            </tr>
            </thead>

            @foreach($veza as $broj => $predmet)
                @if($predmet->profesor_id == $profesor->id)

                    <?php $a++; ?>
                    <tr>
                        <td style="border: 1px solid black;">{{$a}}</td>
                        <td style="border: 1px solid black;">{{$predmet->predmet->predmet->naziv}}</td>
                    </tr>
                @endif

                    @endforeach
        </table>
        <br/>
        <br/>
        <br/>


    @endforeach

</div>