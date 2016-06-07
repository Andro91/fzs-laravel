<table id="tabela">
    <thead>
    <tr>
        <th>
            Naziv
        </th>
    </tr>
    </thead>
    @foreach($region as $item)
        <tr>
            <td>{{$item->naziv}}</td>
        </tr>
    @endforeach
</table>







