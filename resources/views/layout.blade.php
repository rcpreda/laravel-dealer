<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Homestead</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css" integrity="sha384-fLW2N01lMqjakBkx3l/M9EahuwpSfeNvV63J5ezn3uZzapT0u7EYsXMjQV+0En5r" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
    <!--<link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/libs.css"> -->
    <style>
        body {
            margin-top: 75px;
        }
    </style>
    </head>
<body>



    <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Dealers Admin</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        <li class="active"><a href="{{ route('admin.dashboard') }}">Home</a></li>
                        @can('admin.permissions.index')
                            <li><a href="{{ route('admin.permissions.store') }}">Permissions</a></li>
                        @endcan
                        <li><a href="#contact">Contact</a></li>
                    @endif
                </ul>
                @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li><p class="navbar-text">Welcome: {{ Auth::user()->name }} </p></li>
                        <li><a href="{{ route('admin.logout') }}">Logout</a></li>
                    </ul>
                @endif
            </div><!--/.nav-collapse -->

        </div>
    </nav>



    <div class="container">

        @include('partials.flash')

        @yield('content')
    </div>

    <!--<script type="application/javascript" src="/js/libs.js"></script> -->
    @yield('script.footer')


</body>
</html>