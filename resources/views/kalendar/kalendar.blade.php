@extends('layouts.layout')
@section('page_heading','Календар')
@section('section')

<div class="col-sm-12 col-lg-10">
    <a href="{{$putanja}}/kalendar/indexRok/" class="btn btn-primary">
        <span class="fa fa-envelope-square"></span>
        Сви рокови
    </a>
    <br>
    <br>

    <div id='calendar'></div>
</div>

<script>
    $(document).ready(function() {

        $('#calendar').fullCalendar({
            theme: true,
            lang: 'sr-cyrl',
            header:
            {
                left:   'basicDay,basicWeek,month',
                center: 'title',
                right:  'today prev,next'
            },
            editable: true,
            fixedWeekCount: false,
            height: 600,
            eventSources: [
                {
                    url: '/kalendar/eventSource',
                    color: 'blue',
                    textColor: 'white'
                }
            ],
            eventClick: function(calEvent, jsEvent, view) {
                window.location.href = '{{$putanja}}/kalendar/editRok/' + calEvent.id;
            }
        })
    });
</script>
@endsection
