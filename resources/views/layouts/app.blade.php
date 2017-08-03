<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" ng-pp>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title> Project Submission </title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/jquery-ui.css') }}" rel="stylesheet">

        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
        <script src="{{ asset('js/jquery-ui.min.js') }}"></script>
        <script src="{{ asset('js/bootbox.min.js') }}"></script>

        <!-- Scripts -->
        <script>
window.Laravel = {!! json_encode([
        'csrfToken' => csrf_token(),
]) !!}
;
        </script>
    </head>
    <body>
        <div id="app">

            <div class="container">

                <div style="margin-top: 20px; margin-bottom: 20px;">
                    <nav class="navbar navbar-default navbar-static-top">

                        <div class="navbar-header">

                            <!-- Collapsed Hamburger -->
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                                <span class="sr-only">Toggle Navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>

                            <!-- Branding Image -->
                            <a class="navbar-brand" href="{{ url('/') }}">
                                Project Submission
                            </a>
                        </div>
                        <div class="collapse navbar-collapse" id="app-navbar-collapse">
                            <!-- Left Side Of Navbar -->
                            @if (Auth::user())
                            <ul class="nav navbar-nav">
                                <li><a href="{{route('create_project')}}" > Create project </a></li>
                                <li><a href="{{route('projects')}}">  Projects </a></li> 
                            </ul>
                            @endif

                            <!-- Left Side Of Navbar -->
                            <!-- Authentication Links -->
                            @if (Auth::guest())
                            <ul class="nav navbar-nav navbar-right">
                                <li><a href="{{route('login')}}">Login</a></li>
                                <li><a href="{{route('register')}}">Register</a></li>
                            </ul>
                            @else
                            <ul class="nav navbar-nav navbar-right">
                                <li>
                                    <a href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                               document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                            @endif
                        </div>
                    </nav>
                </div>
                @yield('content')

            </div>


        </div>
    </body>
</html>
