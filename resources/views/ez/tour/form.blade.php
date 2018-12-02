'@extends('layouts.master')

@section('title', 'Ez Travel - Tour`s Form')

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
                <h3 class="tittle">Form Pemesanan</h3>
                <span>Ez Travel - Tour</span>
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
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 02"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step03">
                                    <progress class="progress" value="0" max="100"
                                              aria-describedby="Step 03"></progress>
                                    <div class="progress-circle"></div>
                                </div>
                                <div class="step step04 complete">
                                    <progress class="progress" value="0" max="100"
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
                <form class="form-horizontal" role="form" method="get" action="/ez/tour/review">
                    {{ csrf_field() }}
                    @if(Auth::user())
                        <div class="form-group">
                            <label class="control-label col-sm-3" for="name">Masukkan Kode Voucher</label>
                            <div class="col-sm-6">
                                <input type="text" class="form-control" name="voucher"
                                       placeholder="kosongkan jika tidak mempunyai voucher...">
                            </div>
                        </div>
                    @endif
                    <div class="form-group form-inline col-md-12">
                        <label class="control-label col-sm-3" for="destination">Destinasi</label>
                        <div class="col-sm-2">
                            <input type="text" class="form-control" name="destination" placeholder="Destinasi"
                                   value="{{$tour->city->name}}, {{$tour->paket}}" readonly>
                        </div>
                        <label class="control-label col-sm-2" for="harga">Harga (Rp)</label>
                        <div class="col-sm-1">
                            <input type="text" class="form-control" name="total" value="{{$tour->harga}}" readonly>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="payment">Metode Pembayaran</label>
                        <div class="col-sm-6">
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
                            <ul class="payment-methods">
                                <li class="payment-method bca">
                                    <input name="payment_methods" value="BCA" type="radio" id="bca" data-id="tf">
                                    <label for="bca">BCA</label>
                                </li>
                                <li class="payment-method mandiri">
                                    <input name="payment_methods" value="Mandiri" type="radio" id="mandiri"
                                           data-id="tf">
                                    <label for="mandiri">Mandiri</label>
                                </li>
                                <li class="payment-method alfamart">
                                    <input name="payment_methods" value="Alfamart" type="radio" id="alfamart"
                                           data-id="alfamart_form">
                                    <label for="alfamart">Alfamart</label>
                                </li>
                                <li class="payment-method indomaret">
                                    <input name="payment_methods" value="Indomaret" type="radio" id="indomaret"
                                           data-id="indomaret_form">
                                    <label for="indomaret">Indomaret</label>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="name">Nama Lengkap</label>
                        <div class="col-sm-6">
                            @if(Auth::guest())
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Lengkap"
                                       required autofocus>
                            @else
                                <input type="text" class="form-control" name="name" placeholder="Masukkan Nama Lengkap"
                                       value="{{Auth::user()->name}}" required>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="email">E-mail</label>
                        <div class="col-sm-6">
                            @if(Auth::guest())
                                <input type="email" class="form-control" name="email"
                                       placeholder="Masukkan Alamat Email" required>
                            @else
                                <input type="email" class="form-control" name="email"
                                       value="{{Auth::user()->email}}" placeholder="Masukkan Alamat Email" required>
                            @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="handphone">Handphone</label>
                        <div class="col-sm-6">
                            @if(Auth::guest())
                                <input type="text" class="form-control" name="phone"
                                       placeholder="Masukkan Nomor Handphone"
                                       onkeypress="return hanyaAngka(event, false)" maxlength="13" required>
                            @else
                                <input type="text" class="form-control" name="phone"
                                       placeholder="Masukkan Nomor Handphone"
                                       onkeypress="return hanyaAngka(event, false)" maxlength="13" required autofocus>
                            @endif
                            <script>
                                function hanyaAngka(e, decimal) {
                                    var key;
                                    var keychar;
                                    if (window.event) {
                                        key = window.event.keyCode;
                                    } else if (e) {
                                        key = e.which;
                                    } else return true;
                                    keychar = String.fromCharCode(key);
                                    if ((key == null) || (key == 0) || (key == 8) || (key == 9) || (key == 13) || (key == 27)) {
                                        return true;
                                    } else if ((("0123456789").indexOf(keychar) > -1)) {
                                        return true;
                                    } else if (decimal && (keychar == ".")) {
                                        return true;
                                    } else return false;
                                }
                            </script>
                        </div>
                    </div>
                    <div class="form-group form-inline col-md-12">
                        <label class="control-label col-sm-3" for="date">Tanggal Keberangkatan</label>
                        <div class="col-sm-2">
                            <input type="date" class="form-control" name="tgl_keberangkatan" required>
                            <script>
                                var today = new Date().toISOString().split('T')[0];
                                document.getElementsByName("tgl_keberangkatan")[0].setAttribute('min', today);
                            </script>
                        </div>
                        <label class="control-label col-sm-2" for="total">Jumlah Peserta</label>
                        <div class="col-sm-2">
                            <input min="1" max="10" type="number" class="form-control" name="jml_orang"
                                   placeholder="1" required>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="note">Catatan Khusus</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="catatan"
                                   placeholder="*)Kosongkan Apabila Tidak Ada Catatan Khusus">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>
        t1 = window.setTimeout(function () {
            alert("Sesi anda telah habis! Klik OK untuk mengulangi proses pemesanan.");
            window.location = "/ez";
        }, 1200000);
    </script>
@endsection
