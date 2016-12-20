<!doctype html>
<html>

    <head>
        <title>Bands - @yield('title')</title>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="{{ asset('/css/main.css') }}">

    </head>
    <body>

    <div class="jumbotron text-center">
        <h1>Bands</h1>
        <p>The coolest website on earth! Featuring all the bands and their albums. Ya dig?!</p>
    </div>

    <div class="container">

        <nav class="navbar navbar-default" role="navigation">
                <ul class="nav navbar-nav">
                  <li><a href="/bands">Bands</a></li>
                  <li><a href="/albums">Albums</a></li>
                </ul>
        </nav>

        <div class="row">

            <div class="col-md-8 col-md-offset-1">
                @section('content')
                    blah
                @show
            </div>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/datatables/1.10.12/js/dataTables.bootstrap.min.js"></script>
    <script>
        $(function() { $('.table').DataTable({
            'iDisplayLength': 20,
            bInfo: false,
            bFilter:false,
        }); });
    </script>

</body>

</html>
