<!DOCTYPE html>
<html>
    <head>
        <title>Attendance Manager</title>

        <link href="{{asset('css/fullcalendar.min.css')}}" rel="stylesheet" type="text/css">
        <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
        <script src="{{asset('js/jquery.min.js')}}"></script>
        <script src="{{asset('js/bootstrap.min.js')}}"></script>
        <script src="{{asset('js/jquery.ui.touch-punch.min.js')}}"></script>
        <script src="{{asset('js/moment.js')}}"></script>
        <script src="{{asset('js/fullcalendar.min.js')}}"></script>
        @yield('scripts')

    </head>
    <body>
        @yield('content')
    </body>
</html>
