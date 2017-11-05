<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Laravel') }} - @yield('title')</title>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        
        <!-- Icon -->
        <link rel="shortcut icon" href="{{ url('images/favicon.ico') }}">
    </head>
    <body class="skin-black {{ Route::currentRouteName() }}">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <a href="{{ url('/') }}" class="logo">
                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                {{ config('app.name', 'Laravel') }}
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top" role="navigation">
                <div class="navbar-left">
                    <ul class="nav navbar-nav">
                        @if(Auth::check() && Auth::user()->type == 'admin')
                        <li>
                            <a href="{{ url('accounts') }}">
                                <span>Accounts</span>
                            </a>
                        </li>
                        @endif
                        <li>
                            <a href="{{ url('threads') }}">
                                <span>Threads</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="navbar-right">
                    <ul class="nav navbar-nav">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="glyphicon glyphicon-user"></i>
                                <span>{{ Auth::user()->name }}<i class="caret"></i></span>
                            </a>
                            <ul class="dropdown-menu">
                                <li class="user-footer">
                                    <a href="{{ url('settings') }}" class="btn btn-default btn-flat">
                                        Settings
                                    </a>
                                    <a href="{{ route('logout') }}" class="btn btn-default btn-flat"
                                        onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>
                            </ul>
                        </li>
                        @endguest
                    </ul>
                </div>
            </nav>
        </header>
        <div class="wrapper row-offcanvas row-offcanvas-left">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side strech">
                <!-- Content Header (Page header) -->
                <section class="content-header">
                    <h1>
                        @yield('title')
                    </h1>
                </section>
                
                <section class="content">
                    @yield('content')
                </section>
            </aside>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
