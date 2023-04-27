<!DOCTYPE html>
<html>
    <head>
        <title>Laravel</title>
    </head>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <body>
        <div id="app">
            <Vue-Header></Vue-Header>
            <Vue-Table></Vue-Table>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/vue"></script>
        <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
