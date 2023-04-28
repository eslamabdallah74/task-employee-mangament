<!DOCTYPE html>
<html>
    <head>
        <title>Employee Manger</title>
    </head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    
    <body>
        <div id="app">
            <Vue-Header></Vue-Header>
            @yield('content')
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="{{ mix('js/app.js') }}"></script>

    </body>
</html>
