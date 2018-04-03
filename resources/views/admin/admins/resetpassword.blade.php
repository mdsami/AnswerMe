<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>تغيير كلمة المرور</title>

    <!-- Styles -->

    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="{{Request::root()}}/assets/css/ace-skins.min.css" />
    <link rel="stylesheet" href="{{Request::root()}}/assets/css/ace-rtl.min.css" />
    <style type="text/css">
        h1,h2,h3,h4,h5,span,div,nav,label,input,button,table,tr,td,a{
            font-family: 'Cairo', sans-serif;
            color:#751a42;
        }

    </style>
</head>
<body class="no-skin rtl">
    <div id="app">
        <nav class="navbar navbar-default navbar-static-top rtl" style="background-color:#751a42; color:white ">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>

                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}" style="color: white">
                        جاوبني
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
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
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </nav>
<div class="container">
    <div class="row">

        @if(Session::has('status'))
           <div class="alert alert-info text-center">
                <h2>
             {{Session::get('status')}}
                </h2>
           </div>
           
        @endif




        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading" style="background-color:#751a42; color:white ">تسجيل الدخول</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="/passwordChange/{{$remember_token}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">كلمة المرور</label>

                            <div class="col-md-6">
                                <input id="email" type="password" class="form-control" name="password" value="{{ old('password') }}" required autofocus>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                            <div class="form-group{{ $errors->has('password_con') ? ' has-error' : '' }}">
                                <label for="password_con" class="col-md-4 control-label">تاكيد كلمة المرور </label>


                            <div class="col-md-6">
                                <input id="password_con" type="password" class="form-control" name="password_con" value="{{ old('password_con') }}" required autofocus>

                                @if ($errors->has('password_con'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_con') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>






                        <div class="form-group">
                            <div class="col-md-8 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    اعادة تعيين
                                </button>

                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    </div>

    <!-- Scripts -->

</body>
</html>
