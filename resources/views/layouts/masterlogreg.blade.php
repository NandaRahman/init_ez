<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="{{asset('images/icon.png')}}">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/w3.css" type="text/css">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="/js/jquery.min.js"></script>
    <!-- Custom Theme files -->

    <link rel="stylesheet" href="/plugins/datatables/dataTables.bootstrap.css">

    <link rel="stylesheet" href="font-awesome-4.6.3/css/font-awesome.min.css">
    <link href="/bootstrap-social-gh-pages/bootstrap-social.css" rel="stylesheet">
    <link href="/bootstrap-social-gh-pages/assets/css/font-awesome.css" rel="stylesheet">
    <link href="/bootstrap-social-gh-pages/assets/css/docs.css" rel="stylesheet">

    <!--theme-style-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/datepicker-bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="/css/chocolat.css" type="text/css">

    <!--//theme-style-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:title" content="Vide"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script>
        window.Laravel = {!! json_encode([
            'csrfToken' => csrf_token(),
        ]) !!};
    </script>
    <script type="application/x-javascript"> addEventListener("load", function () {
            setTimeout(hideURLbar, 0);
        }, false);
        function hideURLbar() {
            window.scrollTo(0, 1);
        } </script>
    <!---->
    <script src="/js/bootstrap.min.js"></script>
    <!---->
    <link href='//fonts.googleapis.com/css?family=Questrial' rel='stylesheet' type='text/css'>
    <link href='//fonts.googleapis.com/css?family=Open+Sans:400,800italic,800,700italic,700,680italic,680,400italic,300italic,300'
          rel='stylesheet' type='text/css'>
    <script src="/js/jquery.chocolat.js"></script>
    <!--lightboxfiles-->
    <script type="text/javascript">
        $(function () {
            $('.gallery a').Chocolat();
        });
    </script>
    <!--script-->
    <!--startsmothscrolling-->
    <script type="text/javascript" src="/js/move-top.js"></script>
    <script type="text/javascript" src="/js/easing.js"></script>
    <script type="text/javascript">
        jQuery(document).ready(function ($) {
            $(".scroll").click(function (event) {
                event.preventDefault();
                $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
            });
        });
    </script>

    <script src="/js/modernizr.custom.97074.js"></script>
    <style>
        .portfolio-item {
            overflow: hidden;
            margin-left: auto;
            margin-right: auto;
            position: relative;
            /*border: 3px solid rgba(0, 0, 0, 0.4);*/
        }

        .portfolio-item .overlay a {
            position: absolute;
            /*width: 40px;
            height: 40px;
            background-color: #a71e2b;*/
            text-align: center;
            line-height: 40px;
            color: white;
            top: 50%;
            left: 50%;
            margin: -20px 0 0 -20px;
        }

        .portfolio-item .overlay {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            opacity: 0;
            visibility: hidden;
            -webkit-transition: all .2s ease-in-out;
            -moz-transition: all .2s ease-in-out;
            -ms-transition: all .2s ease-in-out;
            -o-transition: all .2s ease-in-out;
            transition: all .2s ease-in-out;
        }

        .portfolio-item:hover .overlay {
            opacity: 1;
            visibility: visible;
        }

        .button {
            top: 100%;
            left: 100%;
            right: 100%;
            bottom: 100%;
            margin: -20px 0 0 -20px;
            color: white;
            padding: 8px 16px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            -webkit-transition-duration: 0.4s; /* Safari */
            transition-duration: 0.4s;
            cursor: pointer;
            font-family: Helvetica;
            border-radius: 24px;
        }

        .d-windows {
            background: transparent;
            color: white;
            border: 2px solid #27ccb4;
        }

        .d-windows:hover {
            background-color: #27ccb4;
        }
    </style>
</head>
<body>
<br><br><br><br><br><br><br>
<nav class="navbar-fixed-top" role="navigation">
    <div class="header">
        <div class="container">
            <div class="header-menu">
                <nav class="navbar navbar-default">
                    <div class="container-fluid">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                                    data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <div class="navbar-brand logo">
                                <a href="/ez"><img src="/images/logotype.png"></a>
                            </div>
                        </div>
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                            <ul class="nav navbar-nav cl-effect-11">
                                <li><a data-hover="Kembali" href="{{ route('ez') }}">Kembali</a></li>
                                @if(Auth::check())
                                    <li class="dropdown">
                                        <a data-hover="{{Auth::user()->email}}" href="#" class="dropdown-toggle"
                                           data-toggle="dropdown"
                                           role="button" aria-expanded="false" style="text-transform: lowercase">
                                            {{ Auth::user()->email}} <span class="caret"></span>
                                        </a>

                                        <ul class="dropdown-menu" role="menu">
                                            <li>
                                                <a href="{{url('ez/member/'.Auth::user()->id.'/edit')}}">Edit
                                                    Profile</a>
                                            </li>
                                            <li>
                                                <a href="{{ route('logout') }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                                    Logout
                                                </a>

                                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                                      style="display: none;">
                                                    {{ csrf_field() }}
                                                </form>
                                            </li>
                                        </ul>
                                    </li>
                                @endif
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.container-fluid -->
                </nav>
            </div>
        </div>
    </div>
</nav>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
@yield('content')
</body>
</html>