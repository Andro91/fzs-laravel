<div style="height: 70px;">
    <img src="{{$putanja}}/images/zaglavlje.png" alt="test alt attribute" width="250" height="65" border="0"/>
</div>
<hr>
@if($diplomirani !== '')

    <div>

        <h1 style="padding-bottom: 100px;">������ ������������ ���������</h1>
        <br/>
        <br/>

        <table style="border: 1px solid black;">
            <thead>
            <tr>
                <th style="border: 1px solid black;">
                    <b>���</b>
                </th>
                <th style="border: 1px solid black;">
                    <b>�������</b>
                </th>
                <th style="border: 1px solid black;">
                    <b>��� ������</b>
                </th>
            </tr>
            </thead>
            @foreach($diplomirani as $item)
                <tr>
                    <td style="border: 1px solid black;">{{$item->student->imeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->student->prezimeKandidata}}</td>
                    <td style="border: 1px solid black;">{{$item->student->brojBodovaTest}}</td>
                </tr>

            @endforeach
        </table>
    </div>
@else
    <h1>���� ������������ ��������� � ���� �������.</h1>
@endif


<br/>
<br/>
<br/>
<div>
    <table>
        <tr>
            <td></td>
            <td></td>
            <td>��������� ����</td>
        </tr>
        <tr>
            <td></td>
            <td style="padding-bottom: 10px;"></td>
            <td style="border-bottom: 1px solid black;"></td>
        </tr>
    </table>
</div>





















