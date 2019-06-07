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
                <h3 class="tittle">Cek Pesanan Anda</h3>
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
                <div class="w3-container col-md-12">
                    <div class="col-md-8">
                        <h2><i class="fa fa-user"></i> Identitas Diri</h2>
                        <div class="w3-panel w3-card"><br>
                            <table>
                                <tr>
                                    <td>Nama Lengkap</td>
                                    <td>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><strong>{{$request->name}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>Alamat Email</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br><strong>{{$request->email}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>No. Telp/HP</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br><strong>{{$request->phone}}</strong></td>
                                </tr>
                                <tr>
                                    <td><br>Metode Pembayaran</td>
                                    <td><br>&nbsp;:&nbsp;&nbsp;</td>
                                    <td><br>
                                        @if($request->payment_methods == "BCA" || $request->payment_methods == "Mandiri")
                                            <strong>Transfer {{$request->payment_methods}}</strong>
                                        @else
                                            <strong>Melalui {{$request->payment_methods}}</strong>
                                        @endif
                                    </td>
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <h2><i class="fa fa-usd"></i> Rincian Harga</h2>
                        <div class="w3-panel w3-card-4"><br>
                            <?php
                            $harga = ($durasi) * ($request->total);
                            $rptotal = number_format($harga, 2, ",", ".");
                            $rpharga = number_format($request->total, 2, ",", ".");
                            ?>
                            <table>
                                <tr>
                                    <td>Harga Sewa Mobil</td>
                                    <td>&nbsp;:&nbsp;&nbsp;</td>
                                    <td align="right"><strong>{{$rpharga}}</strong>&nbsp;&nbsp;&nbsp;</td>
                                </tr>
                                <tr>
                                    <td>Durasi Hari</td>
                                    <td>&nbsp;:&nbsp;&nbsp;</td>
                                    <td align="right"><strong>{{$durasi}} Hari</strong>&nbsp;&nbsp;&nbsp;
                                    </td>
                                </tr>
                                <tr>
                                    <td>&nbsp;</td>
                                    <td>&nbsp;</td>
                                    <td align="right">&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&mdash;&nbsp;<strong>&times;</strong>
                                    </td>
                                </tr>
                                <tr>
                                    <td><h4><strong>Harga Total</strong></h4></td>
                                    <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                    <td align="right"><h4><strong>Rp{{$rptotal}}</strong>&nbsp;&nbsp;&nbsp;</h4></td>
                                </tr>
                            </table>
                            <br>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <br>
                        <h2><i class="fa fa-tags"></i> Detail Pesanan</h2>
                        <div class="w3-panel w3-card">
                            <div class="col-md-14">
                                <div class="w3-panel w3-card-2 col-md-6">
                                    <table>
                                        <tr>
                                            <td><h4><strong>Nomor Pemesanan</strong></h4></td>
                                            <td><h4><strong>&nbsp;:&nbsp;&nbsp;</strong></h4></td>
                                            @foreach($sql as $row)
                                                <?php
                                                $id = ($row->id) + 1;
                                                $kode = sprintf("%010d", $id)
                                                ?>
                                                <td><h4><strong>{{$kode}}</strong></h4></td>
                                            @endforeach
                                        </tr>
                                    </table>
                                </div>
                                <div class="col-md-10">
                                    <table>
                                        <tr>
                                            <td>Operator</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->nama}} &mdash; {{$request->jenis_kendaraan}}
                                                    ({{$request->no_pol}})</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Keberangkatan</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->asal}}
                                                    ({{$request->tgl_keberangkatan}} &ndash; {{$request->jadwal_berangkat}}
                                                    )</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Kedatangan</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->tujuan}}
                                                    ({{$request->tgl_datang}} &ndash; {{$request->jadwal_datang}}
                                                    )</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Jumlah Penumpang</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            <td><strong>{{$request->jml_penumpang}} Orang</strong></td>
                                        </tr>
                                        <tr>
                                            <td>Tipe Travel</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            @if($request->tipe_travel == "")
                                                <td>(kosong)</td>
                                            @else
                                                <td><strong>{{$request->tipe_travel}}</strong></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Durasi</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            @if($durasi == 0)
                                                <td>(kosong)</td>
                                            @else
                                                <td><strong>{{$durasi}} Hari</strong></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Catatan Khusus</td>
                                            <td>&nbsp;:&nbsp;&nbsp;</td>
                                            @if($request->catatan == "")
                                                <td>(kosong)</td>
                                            @else
                                                <td><strong>{{$request->catatan}}</strong></td>
                                            @endif
                                        </tr>
                                        @if($request->tipe_travel == "Sewa_Mobil")
                                            <tr>
                                                <td>Pengemudi</td>
                                                <td>&nbsp;:&nbsp;&nbsp;</td>
                                                @if($request->driver_id == "")
                                                    <td>(kosong)</td>
                                                @else
                                                    <td><strong>{{\App\driver::where('id',$request->driver_id)->first()->name}}</strong></td>
                                                @endif
                                            </tr>
                                        @endif

                                    </table>
                                    <br>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4"><br>
                        <h2><i class="fa fa-hand-o-right"></i> Tahap Selanjutnya</h2>
                        <div class="w3-panel w3-card-4">
                            <div class="col-md-12 text-center">
                                <hr>
                                <h3>Lanjut ke Pembayaran</h3>
                                <form class="form-horizontal" role="form" method="get" action="/ez/travel/payment">
                                    {{ csrf_field() }}
                                    <input type="hidden" name="car_id" value="{{$request->car_id}}">
                                    <input type="hidden" name="name" value="{{$request->name}}">
                                    <input type="hidden" name="email" value="{{$request->email}}">
                                    <input type="hidden" name="payment_methods" value="{{$request->payment_methods}}">
                                    <input type="hidden" name="nama_bandara" value="{{$request->nama_bandara}}">
                                    <input type="hidden" name="phone" value="{{$request->phone}}">
                                    <input type="hidden" name="total" value="{{$harga}}">
                                    <input type="hidden" name="operator" value="{{$request->nama}}">
                                    <input type="hidden" name="jenis_kendaraan" value="{{$request->jenis_kendaraan}}">
                                    <input type="hidden" name="tipe_travel" value="{{$request->tipe_travel}}">
                                    <input type="hidden" name="no_pol" value="{{$request->no_pol}}">
                                    <input type="hidden" name="durasi" value="{{$durasi}}">
                                    @if($request->tipe_travel == "Sewa_Mobil")
                                        <input type="hidden" name="asal" value="{{$request->asal}}">
                                        <input type="hidden" name="driver_id" value="{{$request->driver_id}}">
                                    @else
                                        <input type="hidden" name="nama_bandara" value="{{$request->nama_bandara}}">
                                    @endif

                                    <input type="hidden" name="tujuan" value="{{$request->tujuan}}">
                                    <input type="hidden" name="tgl_keberangkatan"
                                           value="{{$request->tgl_keberangkatan}}">
                                    <input type="hidden" name="jadwal_berangkat"
                                           value="{{$request->jadwal_berangkat}}">
                                    <input type="hidden" name="tgl_datang"
                                           value="{{$request->tgl_datang}}">
                                    <input type="hidden" name="jadwal_datang"
                                           value="{{$request->jadwal_datang}}">
                                    <input type="hidden" name="jml_orang" value="{{$request->jml_penumpang}}">
                                    <input type="hidden" name="catatan" value="{{$request->catatan}}">
                                    <input type="hidden" name="now" value="{{$now}}">
                                    <br>
                                    <button title="Dengan mengklik tombol ini maka anda telah menyetujui syarat dan ketentuan yang berlaku."
                                            data-toggle="tooltip" data-placement="bottom" type="submit"
                                            class="btn btn-primary"><strong>PEMBAYARAN <i
                                                    class="fa fa-chevron-right"></i></strong></button>
                                    <script>
                                        $(document).ready(function () {
                                            $('[data-toggle="tooltip"]').tooltip();
                                        });
                                    </script>
                                </form>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>
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
