<!doctype html>
<html>

    <head>
        <title>Bands - @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    </head>
    <body>

            @if (Route::has('login'))
                <div class="top-right links">
                    <a href="{{ url('/login') }}">Login</a>
                    <a href="{{ url('/register') }}">Register</a>
                </div>
            @endif


    <div class="container">

        <div id="navbar" class="navbar navbar-default">
                <ul class="nav navbar-nav">
                  <li><a href="/">Home</a></li>
                  <li><a href="/bands">Bands</a></li>
                  <li><a href="/albums">Albums</a></li>
                </ul>
        </div>

        <div class="row">

            <div class="col-md-8 col-md-offset-1">
                @section('content')
                    blah
                @show
            </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script><script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>$(function() { $('.table').DataTable(); });</script>

</body>

</html>
