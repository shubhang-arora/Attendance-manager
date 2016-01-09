<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>

        <link href="{{asset('css/fullcalendar.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/jquery.ui.touch-punch.min.js')}}"></script>
        <script src="{{asset('js/moment.js')}}"></script>
        <script src="{{asset('js/fullcalendar.min.js')}}"></script>
        <script>

            $(document).ready(function() {

                $('#calendar').fullCalendar({
                    header: {
                        left: 'prev,next today',
                        center: 'title',
                        right: 'month,agendaWeek,agendaDay'
                    },
                    defaultDate: '2014-06-12',
                    dayClick: function(date, jsEvent, view) {

                        alert('Clicked on: ' + date.format());

                        alert('Coordinates: ' + jsEvent.pageX + ',' + jsEvent.pageY);

                        alert('Current view: ' + view.name);

                        // change the day's background color just for fun
                        $(this).css('background-color', 'red');

                    },
                    defaultView: 'month',
                    editable: true,
                    events: [
                        {
                            title: 'All Day Event',
                            start: '2014-06-01'
                        },
                        {
                            title: 'Long Event',
                            start: '2014-06-07',
                            end: '2014-06-10'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2014-06-09T16:00:00'
                        },
                        {
                            id: 999,
                            title: 'Repeating Event',
                            start: '2014-06-16T16:00:00'
                        },
                        {
                            title: 'Meeting',
                            start: '2014-06-12T10:30:00',
                            end: '2014-06-12T12:30:00'
                        },
                        {
                            title: 'Lunch',
                            start: '2014-06-12T12:00:00'
                        },
                        {
                            title: 'Birthday Party',
                            start: '2014-06-13T07:00:00'
                        },
                        {
                            title: 'Click for Google',
                            url: 'http://google.com/',
                            start: '2014-06-28'
                        }
                    ]

                });

            });

        </script>
    </head>
    <body>
    <div id="calendar"></div>


    </body>
</html>
