@extends('layouts.master')

@section('title', 'Ez Travel - Travel`s Form')

@section('content')
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
                        {{ Auth::user()->email}} <span class="caret"></span>
                    </a>

                    <ul class="dropdown-menu" role="menu">
                        <li>
                            <a href="{{url('ez/member/'.Auth::user()->id.'/history')}}"><i
                                        class="fa fa-shopping-cart"></i> Riwayat Pemesanan</a>
                        </li>
                        <li>
                            <a href="{{url('ez/member/'.Auth::user()->id.'/edit')}}"><i class="fa fa-edit"></i> Edit
                                Profile</a>
                        </li>
                        <li>
                            <a href="{{ route('logout') }}"
                               onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                                <i class="fa fa-sign-out"></i> Logout
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
    </div>
    </div><!-- /.container-fluid -->
    </nav>
    </div>
    </div>
    </div>
    </nav>
    <div class="content">
        <div class="promotions">
            <div class="container">
                <h3 class="tittle">Proses </h3>
                <span>Ez Travel - Travel</span>
                <center>
                    <div class="container" style="width: 51%">
                        <div class="progress-group">
                            <div class="wrapper">
                                <div class="step step01 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 01"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step02">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 02"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step03">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 03"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step04 complete">
                                    <progress class="progress" value="100" max="100"
                                              aria-describedby="Step 04"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step05">
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 05"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                            </div>
                            <div class="progress-labels">
                                <div class="label" style="color: black">Isi Data</div>
                                <div class="label" style="color: black">Review</div>
                                <div class="label" style="color: black">Pembayaran</div>
                                <div class="label" style="color: black">Proses</div>
                                <div class="label" style="color: black">E-Ticket</div>
                            </div>
                        </div>
                    </div>
                </center>
                <br>
                <div class="w3-container -align-center center-block">
                    <div class="col-md-12">
                        <div class="w3-panel w3-card">
                            <br><br><br>
                            <style>
                                .loader {
                                    border: 16px solid #f3f3f3;
                                    border-radius: 50%;
                                    border-top: 16px solid #3498db;
                                    width: 120px;
                                    height: 120px;
                                    -webkit-animation: spin 2s linear infinite;
                                    animation: spin 2s linear infinite;
                                }

                                @-webkit-keyframes spin {
                                    0% {
                                        -webkit-transform: rotate(0deg);
                                    }
                                    100% {
                                        -webkit-transform: rotate(360deg);
                                    }
                                }

                                @keyframes spin {
                                    0% {
                                        transform: rotate(0deg);
                                    }
                                    100% {
                                        transform: rotate(360deg);
                                    }
                                }
                            </style>
                            <center>
                                <div class="loader"></div>
                            </center>
                            <br><br><br>
                            <center><p>Mohon tunggu sebentar, pesanan anda sedang diproses</p></center>

                        </div>
                    </div>

                    {{--<div class="col-md-8">--}}
                    {{--<h2>&nbsp;</h2>--}}
                    {{--<div class="w3-panel w3-card" style="height: 32.3%">--}}
                    {{--<h4>Lanjut Ke Pembayaran</h4>--}}

                    {{--<div class="text-center">--}}
                    {{--<button type="button" class="btn btn-primary">Lanjut Ke Pembayaran</button>--}}
                    {{--<br><br>--}}
                    {{--</div>--}}
                    {{--</div>--}}
                    {{--</div>--}}


                </div>
            </div>
        </div>
    </div>
    @foreach($sql as $row)
        <?php $kode = sprintf("%010d", $row->id)?>
        <script>
            t1 = window.setTimeout(function () {
                window.location = "/ez/travel/{{$kode.'-'.$row->email}}/e-ticket";
            }, 5000);
        </script>
    @endforeach
@endsection
