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
                <h3 class="tittle">Pembayaran</h3>
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
                <br>
                <style>
                    .payment-methods {
                        list-style: none;
                        margin: 0;
                        padding: 0;
                    }

                    .payment-methods:after {
                        content: "";
                        clear: both;
                    }

                    .payment-method {
                        border: 1px solid #ccc;
                        box-sizing: border-box;
                        float: left;
                        height: 70px;
                        position: relative;
                        width: 120px;
                    }

                    .payment-method label {
                        background: #fff no-repeat center center;
                        bottom: 1px;
                        cursor: pointer;
                        display: block;
                        font-size: 0;
                        left: 1px;
                        position: absolute;
                        right: 1px;
                        text-indent: 100%;
                        top: 1px;
                        white-space: nowrap;
                    }

                    .payment-method + .payment-method {
                        margin-left: 25px;
                    }

                    .bca label {
                        background-image: url({{asset('images/bca.jpg')}});
                        background-size: 100%;
                    }

                    .bri label {
                        background-image: url({{asset('images/bri.jpg')}});
                        background-size: 100%;
                    }

                    .bni label {
                        background-image: url({{asset('images/bni.jpg')}});
                        background-size: 100%;
                    }

                    .mandiri label {
                        background-image: url({{asset('images/mandiri.jpg')}});
                        background-size: 100%;
                    }

                    .alfamart label {
                        background-image: url({{asset('images/alfamart.jpg')}});
                        background-size: 100%;
                    }

                    .indomaret label {
                        background-image: url({{asset('images/indomaret.jpg')}});
                        background-size: 100%;
                    }

                    .payment-methods input:focus + label {
                        outline: 2px dotted #21b4d0;
                    }

                    .payment-methods input:checked + label {
                        outline: 4px solid #21b4d0;
                    }

                    .payment-methods input:checked + label:after {
                        background: url(https://dl.dropbox.com/s/vm6hpxjqbupy1xv/checked.png);
                        bottom: -10px;
                        content: "";
                        display: inline-block;
                        height: 20px;
                        position: absolute;
                        right: -10px;
                        width: 20px;
                    }

                    @-moz-document url-prefix() {
                        .payment-methods input:checked + label:after {
                            bottom: 0;
                            right: 0;
                            background-color: #21b4d0;
                        }
                    }
                </style>
                <div class="w3-container -align-center center-block">
                    <div class="col-md-12">
                        <h2><i class="fa fa-bank"></i> Selesaikan Pembayaran </h2>
                        Sisa Waktu anda: <h4 style="color: #0C4487" id="demo"></h4>
                        <div class="w3-panel w3-card text-center">
                            <br>
                            <script>
                                // Set the date we're counting down to
                                var countDownDate = new Date("{{$sekarang}}");
                                countDownDate.setDate(countDownDate.getDate() + 1);

                                // Update the count down every 1 second
                                var x = setInterval(function () {

                                    // Get todays date and time
                                    var now = new Date().getTime();

                                    // Find the distance between now an the count down date
                                    var distance = countDownDate - now;

                                    // Time calculations for days, hours, minutes and seconds
                                    var days = Math.floor(distance / (1000 * 60 * 60 * 24));
                                    var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                                    var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
                                    var seconds = Math.floor((distance % (1000 * 60)) / 1000);

                                    // Output the result in an element with id="demo"
                                    document.getElementById("demo").innerHTML = hours + " jam "
                                        + minutes + " menit " + seconds + " detik ";

                                    // If the count down is over, write some text
                                    if (distance < 0) {
                                        clearInterval(x);
                                        document.getElementById("demo").innerHTML = "EXPIRED";
                                    }
                                }, 1000);
                            </script>
                            <?php $rp = number_format($request->total, 2, ",", ".") ?>
                            @if($request->payment_methods == 'Alfamart' || $request->payment_methods == 'Indomaret')
                                <h4>Mohon segera melakukan pembayaran sebesar <strong>Rp{{$rp}}</strong> dengan
                                    menggunakan kode berikut:</h4>
                                <h4><strong>{{$non_bank}}</strong></h4>
                            @else
                                <h4>Mohon transfer <strong>Rp{{$rp}}</strong> ke rekening berikut:</h4>
                            @endif
                            <br>
                            @if($request->payment_methods == 'BCA')
                                <img src="{{asset('images/bca.jpg')}}" style="width: 25%">
                                <p>No. rek: <strong>12345-67-89-101112-3</strong><br>a/n. <strong>Gusti Bagus Rangga
                                        Saputra</strong></p>
                            @elseif($request->payment_methods == 'Mandiri')
                                <img src="{{asset('images/mandiri.jpg')}}" style="width: 25%">
                                <p>No. rek: <strong>11111-67-89-101112-3</strong><br>a/n. <strong>Gusti Bagus Rangga
                                        Saputra</strong></p>
                            @elseif($request->payment_methods == 'Alfamart')
                                <img src="{{asset('images/alfamart.jpg')}}" style="width: 25%">
                            @else
                                <img src="{{asset('images/indomaret.jpg')}}" style="width: 25%">
                            @endif
                            <br>
                            <p>Setelah anda melakukan pembayaran, mohon upload bukti pembayaran ke kontak
                                berikut:</p>
                            <p style="color: black; font-weight: bold">Tap me!<br>
                                <a href="http://line.me/ti/p/~fitrotindwi"><img
                                            src="{{asset('images/LINE_icon01.png')}}"
                                            width="40"
                                            height="40"></a>
                                <a href="whatsapp://send?text=Hello, Fitro!&phone=+6289675014272&abid=+6289675014272"><img
                                            src="{{asset('images/Whatsapp-ios-7-icon.png')}}" width="40"
                                            height="40"></a>
                            </p>
                            <p>
                                <b>Faris</b>: fariszz | 089675014272<br>
                                <b>Alvin</b>: alvin | 087757232330
                            </p>
                            <hr>
                            <div id="konfirmasi">

                                <p>Setelah anda melakukan pembayaran, silahkan klik tombol dibawah ini</p>
                                <br>
                                <form class="form-horizontal" role="form" method="post" action="/ez/travel/travels">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="car_id" value="{{$request->car_id}}">
                                    <input type="hidden" name="operator" value="{{$request->operator}}">
                                    <input type="hidden" name="jenis_kendaraan" value="{{$request->jenis_kendaraan}}">
                                    <input type="hidden" name="durasi" value="{{$request->durasi}}">
                                    @if($request->tipe_travel == "Sewa_Mobil")
                                        <input type="hidden" name="asal" value="{{$request->asal}}">
                                        <input type="hidden" name="driver_id" value="{{$request->driver_id}}">
                                    @else
                                        <input type="hidden" name="nama_bandara" value="{{$request->nama_bandara}}">
                                    @endif
                                    <input type="hidden" name="tujuan" value="{{$request->tujuan}}">
                                    <input type="hidden" name="tipe_travel" value="{{$request->tipe_travel}}">
                                    <input type="hidden" name="name" value="{{$request->name}}">
                                    <input type="hidden" name="email" value="{{$request->email}}">
                                    <input type="hidden" name="handphone" value="{{$request->phone}}">
                                    <input type="hidden" name="tgl_keberangkatan"
                                           value="{{$request->tgl_keberangkatan}}">
                                    <input type="hidden" name="jadwal_keberangkatan"
                                           value="{{$request->jadwal_berangkat}}">
                                    <input type="hidden" name="tgl_datang"
                                           value="{{$request->tgl_datang}}">
                                    <input type="hidden" name="jadwal_datang"
                                           value="{{$request->jadwal_datang}}">
                                    <input type="hidden" name="jml_orang" value="{{$request->jml_orang}}">
                                    <input type="hidden" name="total" value="{{$request->total}}">
                                    <input type="hidden" name="note" value="{{$request->catatan}}">
                                    <button title="Dengan mengklik tombol ini maka anda akan mendapatkan nomor booking."
                                            data-toggle="tooltip" data-placement="bottom" type="submit"
                                            class="btn btn-primary"><strong>KONFIRMASI PEMBAYARAN <i
                                                    class="fa fa-chevron-right"></i></strong></button>
                                    <script>
                                        $(document).ready(function () {
                                            $('[data-toggle="tooltip"]').tooltip();
                                        });
                                    </script>
                                </form>
                                <br>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection
