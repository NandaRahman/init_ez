<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" type="image/x-icon" href="/images/icon.png">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="/css/w3.css" type="text/css">
    <link href="/css/bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <script src="/js/jquery.min.js"></script>
    <!-- Custom Theme files -->

    <script src="https://www.google.com/recaptcha/api.js"></script>

    <link rel="stylesheet" href="/css/font-awesome.css">

    <!--theme-style-->
    <link href="/css/stylesheet.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/jquery-ui.min.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/datepicker.css" rel="stylesheet" type="text/css" media="all"/>
    <link href="/css/datepicker-bootstrap.css" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" href="/css/chocolat.css" type="text/css">
{{--<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
      type="text/css" media="all"/>--}}

<!--//theme-style-->
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta property="og:title" content="Vide"/>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBjeAFQrj1wF_2L6uwNjuh6Nat6gYE7Gxw&v=3.exp&sensor=false&libraries=places&language=id"></script>
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
            margin: -1px 0 0 -1px;
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
            border-radius: 12px;
        }

        .d-windows {
            background: transparent;
            color: #27ccb4;
            border: 2px solid #27ccb4;
        }

        .d-windows:hover {
            color: #ffffff;
            background-color: #27ccb4;
        }

        .progress {
            display: block;
            width: 100%;
            height: 12px;
            position: relative;
            z-index: 5;
            padding-right: 8px;
            padding-top: 2px;
        }

        @media all and (min--moz-device-pixel-ratio: 0) and (min-resolution: 30dpcm) {
            .progress {
                height: 10px;
            }
        }

        .progress[value] {
            background-color: transparent;
            border: 0;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0;
        }

        .progress[value]::-ms-fill {
            background-color: #0074d9;
            border: 0;
        }

        .progress[value]::-moz-progress-bar {
            background-color: #0074d9;
            margin-right: 8px;
        }

        .progress[value]::-webkit-progress-inner-element {
            background-color: #eee;
        }

        .progress[value]::-webkit-progress-value {
            background-color: #0074d9;
        }

        .progress[value]::-webkit-progress-bar {
            background-color: #eee;
        }

        .progress-circle {
            width: 24px;
            height: 24px;
            position: absolute;
            right: 3px;
            top: -5px;
            z-index: 5;
            border-radius: 50%;
        }

        .progress-circle:before {
            content: "";
            width: 6px;
            height: 6px;
            background: white;
            border-radius: 50%;
            display: block;
            -webkit-transform: translate(-50%, -50%);
            transform: translate(-50%, -50%);
            position: absolute;
            left: 50%;
            top: 50%;
        }

        .progress-group {
            margin-top: 36px;
        }

        @media (max-width: 991px) {
            .progress-group {
                margin-left: -18px;
                margin-right: -18px;
                -ms-flex-preferred-size: 100%;
                flex-basis: 100%;
                padding: 18px;
            }
        }

        @media (max-width: 768px) {
            .progress-group {
                padding: 18px 18px 0;
                margin-bottom: 12px;
            }
        }

        .progress-group .title {
            margin-bottom: 18px;
        }

        .progress-group .wrapper {
            background: white;
            border: 1px solid #eee;
            border-radius: 12px;
            height: 14px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.3));
            filter: drop-shadow(0 0 1px rgba(0, 0, 0, 0.3));
        }

        .progress-group .step {
            width: 20%;
            position: relative;
        }

        .progress-group .step:after {
            content: "";
            height: 30px;
            width: 30px;
            background: white;
            border-radius: 50%;
            display: block;
            position: absolute;
            right: 0;
            top: 50%;
            -webkit-transform: translateY(-50%);
            transform: translateY(-50%);
        }

        .progress-group .step:first-of-type .progress {
            padding-left: 4px;
        }

        .progress-group .step:first-of-type .progress[value]::-moz-progress-bar {
            border-radius: 5px 0 0 5px;
        }

        .progress-group .step:first-of-type .progress[value]::-webkit-progress-value {
            border-radius: 5px 0 0 5px;
        }

        .progress-group .step:not(:first-of-type) .progress[value]::-moz-progress-bar {
            border-radius: 0;
        }

        .progress-group .step:not(:first-of-type) .progress[value]::-webkit-progress-value {
            border-radius: 0;
        }

        .progress-group .step .progress[value] + .progress-circle {
            background: #eee;
        }

        .progress-group .step.step01 .progress[value]::-moz-progress-bar {
            background-color: #23607d;
        }

        .progress-group .step.step01 .progress[value]::-webkit-progress-value {
            background-color: #23607d;
        }

        .progress-group .step.step01 .progress[value="100"] + .progress-circle {
            background-color: #23607d;
        }

        .progress-group .step.step02 .progress[value]::-moz-progress-bar {
            background-color: #2686a4;
        }

        .progress-group .step.step02 .progress[value]::-webkit-progress-value {
            background-color: #2686a4;
        }

        .progress-group .step.step02 .progress[value="100"] + .progress-circle {
            background-color: #2686a4;
        }

        .progress-group .step.step03 .progress[value]::-moz-progress-bar {
            background-color: #30a6cd;
        }

        .progress-group .step.step03 .progress[value]::-webkit-progress-value {
            background-color: #30a6cd;
        }

        .progress-group .step.step03 .progress[value="100"] + .progress-circle {
            background-color: #30a6cd;
        }

        .progress-group .step.step04 .progress[value]::-moz-progress-bar {
            background-color: #26c4c3;
        }

        .progress-group .step.step04 .progress[value]::-webkit-progress-value {
            background-color: #26c4c3;
        }

        .progress-group .step.step04 .progress[value="100"] + .progress-circle {
            background-color: #26c4c3;
        }

        .progress-group .step.step05 .progress[value]::-moz-progress-bar {
            background-color: #10C895;
        }

        .progress-group .step.step05 .progress[value]::-webkit-progress-value {
            background-color: #10C895;
        }

        .progress-group .step.step05 .progress[value="100"] + .progress-circle {
            background-color: #10C895;
        }

        .progress-labels {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
        }

        .progress-labels .label {
            text-align: center;
            text-transform: uppercase;
            margin: 12px 0;
            width: 20%;
            font-size: 11px;
            padding-right: 24px;
            font-weight: 600;
            opacity: 0.7;
        }
    </style>
</head>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
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
                            @yield('content')
                            <div class="copy-section">
                                <div class="container">
                                    <div class="footer-top">
                                        <p>Copyright &copy; 2017 Ez Travel. All rights served. | Design by <a
                                                    href="http://rabbit-media.net">Fq's
                                                Rabbit Media</a></p>
                                    </div>
                                </div>
                            </div>
</body>
</html>