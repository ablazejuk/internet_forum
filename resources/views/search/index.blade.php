<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        
        <title>{{ config('app.name', 'Laravel') }}</title>

        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>

        <!-- Styles -->
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    </head>
    <body class="skin-black">
        <!-- header logo: style can be found in header.less -->
        <header class="header">
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar full-navbar navbar-static-top" role="navigation">
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
        <div class="wrapper row-offcanvas row-offcanvas-left bg-white">
            <!-- Right side column. Contains the navbar and content of the page -->
            <aside class="right-side strech">
                <section class="content bg-white">
                    <div class="row" style="padding-top:125px">
                        <div class="col-xs-12">
                            <form action="{{ url('search') }}" method="GET">
                                {{ csrf_field() }}

                                <div class="box-body">
                                    <div class="row">
                                        <div class="col-md-offset-2 col-md-8">
                                            <span class="logo">
                                                <!-- Add the class icon to your logo image or logo icon to add the margining -->
                                                {{ config('app.name', 'Laravel') }}
                                            </span>
                                        </div>
                                    </div>

                                    <br>

                                    <div class="row">
                                        <div class="col-md-offset-3 col-md-6">
                                            <div class="input-group input-group-sm">
                                                <input name="term" type="text" placeholder="Search term" maxlength="255" class="form-control">
                                                <span class="input-group-btn">
                                                    <button class="btn btn-primary btn-flat" type="submit">
                                                        <i class="fa fa-search fa-lg"></i>
                                                    </button>
                                                </span>
                                            </div>
                                        </div>
                                        <div class="col-md-3">
                                            @if($errors->has('term'))
                                                <div class="text-danger">{{ $errors->first('term') }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </section>
            </aside>
        </div>
        <!-- Scripts -->
        <script src="{{ asset('js/app.js') }}"></script>
    </body>
</html>
