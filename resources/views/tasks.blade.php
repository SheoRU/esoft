 <html>
    <head>
        <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
        <link rel="stylesheet" type="text/css" href="{{ url('css/app.css') }}">
        <script>
            $( function() {
                 $( "#datepicker" ).datepicker({
                    dateFormat: "yy-mm-dd",
                    minDate: 0,
                 });
            });
        </script>
    </head>
    <body>
    @extends('layouts.taskLayout')
        <h1 style="text-align:center;">Страница задач</h1>
        
    </body>
</html>