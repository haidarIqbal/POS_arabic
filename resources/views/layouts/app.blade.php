<!DOCTYPE html>
<html lang="en" ng-app>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Store</title>
    <!-- Fonts -->
    <link href="{{asset('public/assets/css/font-awesome.min.css')}}" rel='stylesheet' type='text/css'>
   

    <!-- Styles -->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet">
    {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}

    <style>
        body {
            font-family: 'Lato';
        }

        .fa-btn {
            margin-right: 6px;
        }
    </style>
</head>
<body id="app-layout">
    <nav class="navbar navbar-default navbar-static-top">
        <div class="container">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

              
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <br>
                    @if(!Auth::guest() && Auth::user()->admin)
                <ul class="nav navbar-nav">
                <a class="btn btn-primary"  href="{{ url('/') }}">الصفحة الرئيسية</a></li>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/orders') }}">مكان الامر</a>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/product/create') }}">أضف منتج</a>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/quotation') }}">احصل على تسعيرة</a>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/product') }}">متجر</a>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/sales') }}">مبيعات</a>
                <a class="btn btn-primary" href="{{ url('store/'.$store.'/customers') }}">عملاء
</a>
                        
                </ul>
                <ul class="nav navbar-nav navbar-right">
                        <a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>تسجيل خروج</a>
                    </ul>
                    @else
                    <a class="btn btn-primary" href="{{ url('/login') }}">Login</a>
                    @endif
            </div>
        </div>
    </nav>

    @yield('content')

    <!-- JavaScripts -->
 	<script src="{{ asset('public/assets/js/angular.min.js')}}"></script>   
    <script src="{{ asset('public/assets/js/angular-resource.min.js')}}">
    </script>
    <script src="{{ asset('public/assets/js/angular-route.min.js')}}"> </script>
     <script src="{{ asset('public/assets/js/jquery.min.js')}}"></script>
    <script src="{{ asset('public/assets/js/bootstrap.min.js')}}"></script>
    {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
    
</body>
	
</html>
