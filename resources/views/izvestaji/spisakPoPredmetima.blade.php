<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($studenti !== '' && $programi !== '' && $programi !== [] && $programi !== null && $predmet !== '')

    <div>

        <h1 style="padding-bottom: 100px;">Списак студената који слушају предмет {{$predmet}}</h1>
        <br/>
        <br/>

        @foreach($programi as $program)
            <label style="padding-bottom: 10px;">{{$program->program->naziv}}</label>
            <br/>
            <br/>
            <table style="border: 1px solid black;">
                <thead>
                <tr>
                    <th style="border: 1px solid black;width:40px"><b>Р.бр.</b></th>
                    <th style="border: 1px solid black;width:80px"><b>Број индекса</b></th>
                    <th style="border: 1px solid black;width:200px">
                        <b>Име и презиме</b>
                    </th>
                    <th style="border: 1px solid black;width:150px">
                        <b>Мејл</b>
                    </th>
                    <th style="border: 1px solid black;width:60px">
                        <b>Година</b>
                    </th>
                </tr>
                </thead>
                <?php $a = 0;?>
                @foreach($studenti as $item)
                    @if($item->program_id == $program->program->id && $item->godina == $program->godinaStudija_id)
                        <?php $a++; ?>
                        <tr>
                            <td style="border: 1px solid black;width:40px">{{$a}}</td>
                            <td style="border: 1px solid black;width:80px">{{$item->brojIndeksa}}</td>
                            <td style="border: 1px solid black;width:200px">{{$item->imeKandidata}} {{$item->prezimeKandidata}}</td>
                            <td style="border: 1px solid black;width:150px">{{$item->email}}</td>
                            <td style="border: 1px solid black;width:60px">{{$item->godina}}</td>
                        </tr>
                    @endif
                @endforeach
            </table>
            <br/>
            <br/>
            <br/>
        @endforeach
    </div>
@else
    <h1>Нема регистрованих студената</h1>
@endif