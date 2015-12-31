<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Dealers</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('css/all.css') }}">
    <script src="{{ asset('js/app.js') }}"></script>
    <!--<script src="{{ asset('js/all.js') }}"></script> -->
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
                <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Dealers</a>
            </div>
            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @if(Auth::check())
                        @can('admin.car.index')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Cars<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.car.index') }}">Cars List</a></li>
                            </ul>
                        </li>
                        @endcan

                        <li><a href="#contact">Contact</a></li>
                    @endif
                </ul>
                @if(Auth::check())
                    <ul class="nav navbar-nav navbar-right">
                        <li><p class="navbar-text">Welcome: {{ Auth::user()->name }} ({{ ucfirst($user->site->name) }}) </p></li>
                        @can('admin.permissions.index')
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Actions<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li><a href="{{ route('admin.permissions.store') }}">Permissions</a></li>
                            </ul>
                        </li>
                        @endcan
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