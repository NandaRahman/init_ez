@extends('layouts.masterverify')

@section('title', 'Ez Travel - Verify Account')

@section('content')
    <div class="navbar-brand logo">
        <a href="/"><img src="/images/logotype.png"></a>
    </div>
    </div>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav cl-effect-11">
            <li><a data-hover="Kembali" href="/ez">Kembali</a></li>
            @if (Auth::guest())
                <li>
                    <a data-hover="Login/Register" href="{{ route('login') }}">
                        Login/Register
                    </a>
                </li>
            @else
                <li class="dropdown">
                    <a data-hover="{{Auth::user()->email}}" href="#" class="dropdown-toggle" data-toggle="dropdown"
                       role="button" aria-expanded="false" style="text-transform: lowercase">
                        {{ Auth::user()->email }} <span class="caret"></span>
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
    <div class="about-section" id="about">
        <div class="container">
            <h3 class="tittle">Verifikasi E-mail Anda</h3>
            <div class="about-grids">
                <div class="col-md-4 about-grid">
                    <img src="/images/tt2.png" class="img-responsive" alt=""/>
                </div>
                <div class="col-md-8 about-grid1">
                    <div class="about-top">
                        <div class="about-left">
                            <i class="glyphicon glyphicon-envelope" aria-hidden="true"></i>
                        </div>
                        <div class="about-right">
                            <h4>Cek email anda!</h4>
                            @foreach($sql as $row)
                                <p align="justify">Registrasi Berhasil! Kami telah mengirimkan pesan ke
                                    <strong>{{$row->email}}</strong>. Mohon untuk
                                    membuka dan verifikasi email anda dengan cara klik tombol "<strong>Aktifkan
                                        Akun</strong>" untuk
                                    mengaktifkan akun anda.</p>
                            @endforeach
                        </div>
                        <div class="about-left">&nbsp;</div>
                        <div class="about-right">
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br><br><br>
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