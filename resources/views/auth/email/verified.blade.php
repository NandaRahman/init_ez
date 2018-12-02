@extends('layouts.masterverify')

@section('title', 'Ez Travel - Verified Account')

@section('content')
    <div class="navbar-brand logo">
        <a href=""><img src="/images/logotype.png"></a>
    </div>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cl-effect-11">
            <li><a data-hover="Kembali" href="">Kembali</a></li>
            @if (Auth::guest())
                <li>
                    <a data-hover="Login/Register" href="">
                        Login/Register
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a data-hover="{{Auth::user()->email}}" href="" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false" style="text-transform: lowercase">
                        {{ Auth::user()->email }} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href=""
                               onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                Logout
                            </a>

                            <form id="logout-form" action="" method="POST" style="display: none;">
                                {{ csrf_field() }}
                            </form>
                        </li>
                    </ul>
                </li>
            @endif
        </ul>
    </div>
    <div class="about-section" id="about">
        <div class="container">
            <h3 class="tittle">Konfirmasi Anda Bukan Robot</h3>
            <div class="about-grids">
                <div class="col-md-4 about-grid">
                    <img src="/images/tt2.png" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-8 about-grid1">
                    <div class="about-top">
                        <div class="about-left">
                            <i class="glyphicon glyphicon-user" aria-hidden="true"></i>
                        </div>
                        <div class="about-right">
                            <h4>Konfirmasi bahwa anda manusia</h4>
                            <p>Karena Anda telah berhasil sejauh ini, kami berasumsi Anda benar-benar manusia yang
                                hidup. Tapi kami perlu keyakinan yang super bahwa Anda bukanlah robot.</p>
                            <form action="{{route('login/notrobot')}}" method="post" id="form">
                                {{ csrf_field() }}
                                <div class="g-recaptcha" data-sitekey="6LfDTyIUAAAAAA-o507HOltdHgxMAiCsKsm3G67b"></div>
                                <button type="submit" class="btn d-windows button btn-block"
                                        style="margin-top:15px;"><strong>SAYA BUKAN ROBOT!</strong></button>
                            </form>
                            <script>
                                $(function () {
                                    $('#form').submit(function (event) {
                                        var verified = grecaptcha.getResponse();
                                        if (verified.length === 0) {
                                            event.preventDefault();
                                            alert('Mohon konfirmasi bahwa Anda bukan robot dengan cara klik pada kotak dialog reCAPTCHA.');
                                        }
                                    });
                                });
                            </script>
                        </div>
                        <div class="about-left">&nbsp;</div>
                        <div class="about-right">
                            <br><br><br><br><br><br><br><br><br><br><br>
                            <p>Copyright &copy; 2017 Ez Travel. All rights served. | Design by <a
                                        href="http://rabbit-media.net">Fq's
                                    Rabbit Media</a></p>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
@endsection