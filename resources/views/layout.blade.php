<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/all.css') }}"> -->
    <script src="{{ asset('js/app.js') }}"></script>
    <!-- <script src="{{ asset('js/all.js') }}"></script> -->
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